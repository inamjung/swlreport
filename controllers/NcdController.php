<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;


class NcdController extends Controller
{
   public $enableCsrfValidation = false;
  
   public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=> ['index','dm0','dm1','dmht1','dmhtckd','indexdm'],
                'ruleConfig'=>[
                    'class'=>AccessRule::className()
                ],
                'rules'=>[
                    [
                        'actions'=>['index','dm0','dm1','dmht1','dmhtckd','indexdm'],
                        'allow'=> true,
                        'roles'=>[
                            //User::ROLE_USER,
                            User::ROLE_MODERATOR,
                            User::ROLE_ADMIN

                        ]
                    ],
//                    [
//                        'actions'=>['index','dm0','dm1','dmht1','dmhtckd','indexdm'],
//                        'allow'=> true,
//                        'roles'=>[
//                           
//                            User::ROLE_MODERATOR,
//                            User::ROLE_ADMIN
//                        ]
//                    ],                   
                ]
            ]
        ];
    }
    public function actionIndex(){
        $connection = Yii::$app->db2;
        $data = $connection->createCommand('
           SELECT begin_year as y
            ,sum(( c.clinic)  ="001") as dm
            ,sum(( c.clinic)  ="002") as ht
            ,sum(( c.clinic)  ="024") as ckd
            ,sum(( c.clinic)  ="015") as asthma
            ,sum(( c.clinic)  ="019") as copd
            FROM clinicmember c
            WHERE c.clinic_member_status_id in ("3","11") AND begin_year > 2552
            AND c.dchdate IS NULL
            GROUP BY begin_year ORDER BY begin_year ASC
            ')->queryAll();
        //เตรียมข้อมูลส่งให้กราฟ
        for($i=0;$i<sizeof($data);$i++){
            $y[] = $data[$i]['y'];           
            $dm[] = $data[$i]['dm']*1;
            $ht[] = $data[$i]['ht']*1;
            $ckd[] = $data[$i]['ckd']*1;  
            $asthma[] = $data[$i]['asthma']*1;
            $copd[] = $data[$i]['copd']*1;
        }
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
//            'sort'=>[""
//                //'attributes'=>['y']
//            ],
        ]);
        return $this->render('index',[
            'dataProvider'=>$dataProvider,
            'y'=>$y,'dm'=>$dm,'ht'=>$ht,'ckd'=>$ckd,'asthma'=>$asthma,'copd'=>$copd,
        ]);
    }
    public function actionIndexdm()
    {        
        
       $connection = Yii::$app->db2;
        $data = $connection->createCommand('
           SELECT cc.`name` as clinicname
            ,SUM((vp.tmbpart) ="01") as a
            ,SUM((vp.tmbpart) ="02") as b
            ,SUM((vp.tmbpart) ="03") as c
            ,SUM((vp.tmbpart) ="04") as d
            ,SUM((vp.tmbpart) ="05") as e
            FROM tem_vpatient vp
            LEFT JOIN clinicmember c on c.hn=vp.hn
            LEFT JOIN clinic cc on cc.clinic=c.clinic
            WHERE c.clinic="001" and clinic_member_status_id in ("3","11")
                        ')->queryAll();
        //เตรียมข้อมูลส่งให้กราฟ
        for($i=0;$i<sizeof($data);$i++){
            $clinicname[] = $data[$i]['clinicname'];           
            $a[] = $data[$i]['a']*1;
            $b[] = $data[$i]['b']*1;
            $c[] = $data[$i]['c']*1;
            $d[] = $data[$i]['d']*1;
            $e[] = $data[$i]['e']*1;
        }
        
       $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
            
        ]);
        return $this->render('indexdm',[
            'dataProvider'=>$dataProvider,
            'clinicname'=>$clinicname,'a'=>$a,'b'=>$b,'c'=>$c,'d'=>$d,'e'=>$e,
        ]);
    }
    public function actionDm0() {
        
        $sql = "SELECT c.hn,vp.sex, vp.ptname ,(year(now())-year(vp.birthday)) as age,CONCAT(vp.addrpart,' หมู่',vp.moopart ,' ',vp.full_name ) as adr 
            ,vp.moopart,vp.tmbpart 
            ,vp.hospcode,vp.hospmain,vp.hospsub
            FROM tem_vpatient vp
            LEFT JOIN clinicmember c on c.hn=vp.hn
            WHERE c.clinic='001' and clinic_member_status_id in ('3','11')
            ORDER BY vp.tmbpart ";
        try {
            $rawData = \Yii::$app->db2->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' =>[
                'pageSize'=>15
            ],
        ]);
        return $this->render('dm0', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    'rawData'=>$rawData,
                    
        ]);
    }
   public function actionDm1() {
        
        $date1 = "";
        $date2 = "";
        $tmbpart ="";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $tmbpart = $_POST['tmbpart'];
        }
        
$sql = "

SELECT * 
FROM (select CONCAT(p.pname,p.fname,space(3),p.lname) as ptname ,p.sex,p.hn,p.addrpart,p.moopart, p.tmbpart,p.amppart,p.chwpart, 
CONCAT(p.chwpart,p.amppart ) as ad,p.informaddr as ad1,v.age_y, s.smoking_type_name as smoke,d.drinking_type_name as drink,


(select lo3.lab_order_result from lab_order lo3 
left outer join lab_head lh3 on lh3.lab_order_number=lo3.lab_order_number 
where lo3.lab_items_code='257' and lh3.hn=o.hn 
and lh3.order_date between '$date1' AND '$date2'  
order by lh3.report_date desc,lh3.report_time desc limit 0,1) as micro_albumin1 ,

(select lo4.lab_order_result from lab_order lo4 
left outer join lab_head lh4 on lh4.lab_order_number=lo4.lab_order_number 
where lo4.lab_items_code='236' and lh4.hn=o.hn 
and lh4.order_date between '$date1' AND '$date2'   
order by lh4.report_date desc,lh4.report_time desc limit 0,1) as HbA1c1 ,

(select lo5.lab_order_result from lab_order lo5 
left outer join lab_head lh5 on lh5.lab_order_number=lo5.lab_order_number 
where lo5.lab_items_code='92' and lh5.hn=o.hn   
and lh5.order_date between '$date1' AND '$date2' 
order by lh5.report_date desc,lh5.report_time desc limit 0,1) as LDL1 ,

(select lo6.lab_order_result from lab_order lo6 
left outer join lab_head lh6 on lh6.lab_order_number=lo6.lab_order_number 
where lo6.lab_items_code='81' and lh6.hn=o.hn   
and lh6.order_date between '$date1' AND '$date2' 
order by lh6.report_date desc,lh6.report_time desc limit 0,1) as K1 ,

(select lo7.lab_order_result from lab_order lo7 
left outer join lab_head lh7 on lh7.lab_order_number=lo7.lab_order_number 
where lo7.lab_items_code='82' and lh7.hn=o.hn 
and lh7.order_date between '$date1' AND '$date2'   
order by lh7.report_date desc,lh7.report_time desc limit 0,1) as bicarb1 ,

(select lh.order_date from lab_order lo
left outer join lab_head lh on lh.lab_order_number=lo.lab_order_number
where lo.lab_items_code='78' and lh.hn=o.hn
and lh.order_date between '$date1' AND '$date2' 
order by lh.report_date desc,lh.report_time desc limit 0,1) as Cr_date,

(select lo.lab_order_result from lab_order lo 
left outer join lab_head lh on lh.lab_order_number=lo.lab_order_number 
where lo.lab_items_code='78' and lh.hn=o.hn   
and lh.order_date between '$date1' AND '$date2' 
order by lh.report_date desc,lh.report_time desc limit 0,1) as cr ,

(select lh1.order_date from lab_order lo1
left outer join lab_head lh1 on lh1.lab_order_number=lo1.lab_order_number
where lo1.lab_items_code='78' and lh1.hn=o.hn
and lh1.order_date between '$date1' AND '$date2' 
order by lh1.report_date desc,lh1.report_time desc limit 1,1) as Cr_date1,

(select lo1.lab_order_result from lab_order lo1
left outer join lab_head lh1  on lh1.lab_order_number=lo1.lab_order_number 
where lo1.lab_items_code='78' and lh1.hn=o.hn    
and lh1.order_date between '$date1' AND '$date2' 
order by lh1.report_date desc,lh1.report_time desc limit 1,1) as cr1,

(select round((186*exp(-1.154*ln(lo.lab_order_result))*exp(-0.203*ln(v.age_y))*if(p.sex=1,1,0.742) ),2) from lab_order lo
left outer join lab_head lh on lh.lab_order_number=lo.lab_order_number
where lo.lab_items_code='78' and lh.hn=o.hn
and lh.order_date between '$date1' AND '$date2' 
order by lh.report_date desc,lh.report_time desc limit 0,1) as GFR,

(select round((186*exp(-1.154*ln(lo.lab_order_result))*exp(-0.203*ln(v.age_y))*if(p.sex=1,1,0.742) ),2) from lab_order lo
left outer join lab_head lh on lh.lab_order_number=lo.lab_order_number
where lo.lab_items_code='78' and lh.hn=o.hn
and lh.order_date between '$date1' AND '$date2' 
order by lh.report_date desc,lh.report_time desc limit 1,1) as GFR1

FROM opdscreen o 
left outer join vn_stat v on v.vn=o.vn
LEFT OUTER JOIN patient p ON p.hn=o.hn 
LEFT JOIN smoking_type s on s.smoking_type_id=o.smoking_type_id
LEFT JOIN drinking_type d on d.drinking_type_id=o.drinking_type_id
WHERE o.hn in (SELECT hn FROM clinicmember WHERE clinic ='001' AND clinic_member_status_id in (3,11))

and o.vstdate between '$date1' AND '$date2'
AND p.tmbpart='$tmbpart'
GROUP BY o.hn order by GFR desc) as ttemp  
WHERE cr>0  AND cr1 >0 ";
        
        try {
            $rawData = \Yii::$app->db2->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
           
            'allModels' => $rawData,
            'pagination' =>FALSE
        ]);
        return $this->render('dm1', [
                    'dataProvider' => $dataProvider,
                    
                    'sql' => $sql,
                    'rawData'=>$rawData,
                    'date1' => $date1,
                    'date2' => $date2,
                    'tmbpart'=> $tmbpart
                    
                   
        ]);
    }

    
public function actionDmhtckd() {
        
        $date1 = "";
        $date2 = "";
        $tmbpart ="";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $tmbpart = $_POST['tmbpart'];
        }
        
$sql = "

SELECT * 
FROM (select CONCAT(p.pname,p.fname,space(3),p.lname) as ptname ,p.sex,p.hn,p.addrpart,p.moopart, p.tmbpart,p.amppart,p.chwpart, 
CONCAT(p.chwpart,p.amppart ) as ad,p.informaddr as ad1,v.age_y, s.smoking_type_name as smoke,d.drinking_type_name as drink,


(select lo3.lab_order_result from lab_order lo3 
left outer join lab_head lh3 on lh3.lab_order_number=lo3.lab_order_number 
where lo3.lab_items_code='257' and lh3.hn=o.hn 
and lh3.order_date between '$date1' AND '$date2'  
order by lh3.report_date desc,lh3.report_time desc limit 0,1) as micro_albumin1 ,

(select lo4.lab_order_result from lab_order lo4 
left outer join lab_head lh4 on lh4.lab_order_number=lo4.lab_order_number 
where lo4.lab_items_code='236' and lh4.hn=o.hn 
and lh4.order_date between '$date1' AND '$date2'   
order by lh4.report_date desc,lh4.report_time desc limit 0,1) as HbA1c1 ,

(select lo5.lab_order_result from lab_order lo5 
left outer join lab_head lh5 on lh5.lab_order_number=lo5.lab_order_number 
where lo5.lab_items_code='92' and lh5.hn=o.hn   
and lh5.order_date between '$date1' AND '$date2' 
order by lh5.report_date desc,lh5.report_time desc limit 0,1) as LDL1 ,

(select lo6.lab_order_result from lab_order lo6 
left outer join lab_head lh6 on lh6.lab_order_number=lo6.lab_order_number 
where lo6.lab_items_code='81' and lh6.hn=o.hn   
and lh6.order_date between '$date1' AND '$date2' 
order by lh6.report_date desc,lh6.report_time desc limit 0,1) as K1 ,

(select lo7.lab_order_result from lab_order lo7 
left outer join lab_head lh7 on lh7.lab_order_number=lo7.lab_order_number 
where lo7.lab_items_code='82' and lh7.hn=o.hn 
and lh7.order_date between '$date1' AND '$date2'   
order by lh7.report_date desc,lh7.report_time desc limit 0,1) as bicarb1 ,

(select lh.order_date from lab_order lo
left outer join lab_head lh on lh.lab_order_number=lo.lab_order_number
where lo.lab_items_code='78' and lh.hn=o.hn
and lh.order_date between '$date1' AND '$date2' 
order by lh.report_date desc,lh.report_time desc limit 0,1) as Cr_date,

(select lo.lab_order_result from lab_order lo 
left outer join lab_head lh on lh.lab_order_number=lo.lab_order_number 
where lo.lab_items_code='78' and lh.hn=o.hn   
and lh.order_date between '$date1' AND '$date2' 
order by lh.report_date desc,lh.report_time desc limit 0,1) as cr ,

(select lh1.order_date from lab_order lo1
left outer join lab_head lh1 on lh1.lab_order_number=lo1.lab_order_number
where lo1.lab_items_code='78' and lh1.hn=o.hn
and lh1.order_date between '$date1' AND '$date2' 
order by lh1.report_date desc,lh1.report_time desc limit 1,1) as Cr_date1,

(select lo1.lab_order_result from lab_order lo1
left outer join lab_head lh1  on lh1.lab_order_number=lo1.lab_order_number 
where lo1.lab_items_code='78' and lh1.hn=o.hn    
and lh1.order_date between '$date1' AND '$date2' 
order by lh1.report_date desc,lh1.report_time desc limit 1,1) as cr1,

(select round((186*exp(-1.154*ln(lo.lab_order_result))*exp(-0.203*ln(v.age_y))*if(p.sex=1,1,0.742) ),2) from lab_order lo
left outer join lab_head lh on lh.lab_order_number=lo.lab_order_number
where lo.lab_items_code='78' and lh.hn=o.hn
and lh.order_date between '$date1' AND '$date2' 
order by lh.report_date desc,lh.report_time desc limit 0,1) as GFR,

(select round((186*exp(-1.154*ln(lo.lab_order_result))*exp(-0.203*ln(v.age_y))*if(p.sex=1,1,0.742) ),2) from lab_order lo
left outer join lab_head lh on lh.lab_order_number=lo.lab_order_number
where lo.lab_items_code='78' and lh.hn=o.hn
and lh.order_date between '$date1' AND '$date2'  
order by lh.report_date desc,lh.report_time desc limit 1,1) as GFR1

FROM opdscreen o 
left outer join vn_stat v on v.vn=o.vn
LEFT OUTER JOIN patient p ON p.hn=o.hn 
LEFT JOIN smoking_type s on s.smoking_type_id=o.smoking_type_id
LEFT JOIN drinking_type d on d.drinking_type_id=o.drinking_type_id
WHERE o.hn in (SELECT hn FROM clinicmember WHERE clinic ='001' AND clinic_member_status_id in (3,11) )
AND o.hn in (SELECT hn FROM clinicmember WHERE clinic ='002'    AND clinic_member_status_id in (3,11) )
AND o.hn in (SELECT hn FROM clinicmember WHERE clinic ='024'    AND clinic_member_status_id in (3,11) )
and o.vstdate between '$date1' AND '$date2'
AND p.tmbpart='$tmbpart'
GROUP BY o.hn order by GFR desc) as ttemp  
WHERE cr>0  AND cr1 >0 ";
        
        try {
            $rawData = \Yii::$app->db2->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
           
            'allModels' => $rawData,
            'pagination' =>FALSE
        ]);
        return $this->render('dmhtckd', [
                    'dataProvider' => $dataProvider,
                    
                    'sql' => $sql,
                    'rawData'=>$rawData,
                    'date1' => $date1,
                    'date2' => $date2,
                    'tmbpart'=> $tmbpart
                    
                   
        ]);
    }
}
    