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


class RpstController extends Controller
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
                'only'=> ['index','cvdrisk0','cvdrisk01'],
                'ruleConfig'=>[
                    'class'=>AccessRule::className()
                ],
                'rules'=>[
                    [
                        'actions'=>['index','cvdrisk0','cvdrisk01'],
                        'allow'=> true,
                        'roles'=>[
                            User::ROLE_USER,
                            User::ROLE_MODERATOR,
                            User::ROLE_ADMIN

                        ]
                    ],                                     
                ]
            ]
        ];
    } 
    public function actionIndex()
    {       
                
       $connection = Yii::$app->db2;
        $data = $connection->createCommand('
           select if(v.sex=1,"ชาย","หญิง") sex
            ,sum((select color from colorchart where has=if(s.tc>0,"Y","N") 
              and chronic=if(cm.hn is not null,"Y","N") 
              and sex=v.sex  
              and age=if(v.age_y>=70,70,if(v.age_y>=60,60,if(v.age_y>=50,50,40)))
              and smoke=if(s.smoking_type_id=2,"Y","N")  
              and bp=if(s.bps>=180,180,if(s.bps>=160,160,if(s.bps>=140,140,120))) 
              and cholesterol=if(s.tc>=320,320,if(s.tc>=280,280,if(s.tc>=240,240,if(s.tc>=200,200,160)))) limit 1)=1
              and s.tc>0) as s1
            ,sum((select color from colorchart where has=if(s.tc>0,"Y","N") 
              and chronic=if(cm.hn is not null,"Y","N") 
              and sex=v.sex  
              and age=if(v.age_y>=70,70,if(v.age_y>=60,60,if(v.age_y>=50,50,40)))
              and smoke=if(s.smoking_type_id=2,"Y","N")  
              and bp=if(s.bps>=180,180,if(s.bps>=160,160,if(s.bps>=140,140,120))) 
              and cholesterol=if(s.tc>=320,320,if(s.tc>=280,280,if(s.tc>=240,240,if(s.tc>=200,200,160)))) limit 1)=2
              and s.tc>0) as s2
            ,sum((select color from colorchart where has=if(s.tc>0,"Y","N") 
              and chronic=if(cm.hn is not null,"Y","N") 
              and sex=v.sex  
              and age=if(v.age_y>=70,70,if(v.age_y>=60,60,if(v.age_y>=50,50,40)))
              and smoke=if(s.smoking_type_id=2,"Y","N")  
              and bp=if(s.bps>=180,180,if(s.bps>=160,160,if(s.bps>=140,140,120))) 
              and cholesterol=if(s.tc>=320,320,if(s.tc>=280,280,if(s.tc>=240,240,if(s.tc>=200,200,160)))) limit 1)=3
              and s.tc>0) as s3
            ,sum((select color from colorchart where has=if(s.tc>0,"Y","N") 
              and chronic=if(cm.hn is not null,"Y","N") 
              and sex=v.sex  
              and age=if(v.age_y>=70,70,if(v.age_y>=60,60,if(v.age_y>=50,50,40)))
              and smoke=if(s.smoking_type_id=2,"Y","N")  
              and bp=if(s.bps>=180,180,if(s.bps>=160,160,if(s.bps>=140,140,120))) 
              and cholesterol=if(s.tc>=320,320,if(s.tc>=280,280,if(s.tc>=240,240,if(s.tc>=200,200,160)))) limit 1)=4
              and s.tc>0) as s4
            ,sum((select color from colorchart where has=if(s.tc>0,"Y","N") 
              and chronic=if(cm.hn is not null,"Y","N") 
              and sex=v.sex  
              and age=if(v.age_y>=70,70,if(v.age_y>=60,60,if(v.age_y>=50,50,40)))
              and smoke=if(s.smoking_type_id=2,"Y","N")  
              and bp=if(s.bps>=180,180,if(s.bps>=160,160,if(s.bps>=140,140,120))) 
              and cholesterol=if(s.tc>=320,320,if(s.tc>=280,280,if(s.tc>=240,240,if(s.tc>=200,200,160)))) limit 1)=5
              and s.tc>0) as s5
              from vn_stat v 
              left join patient pt on pt.hn=v.hn 
              left join opdscreen s on s.vn=v.vn 
              join clinicmember cm on v.hn=cm.hn and cm.clinic=001 
              left join ovstdiag odx on v.vn=odx.vn 
              where v.vstdate between "2014-10-01" and "2015-09-30" 
              and s.tc>0   
              and (odx.icd10 between "E10" and "E1499")
                    GROUP BY v.sex
              ')->queryAll();
        //กราฟ
        for($i=0;$i<sizeof($data);$i++){
            $sex[] = $data[$i]['sex'];           
            $s1[] = $data[$i]['s1']*1;
            $s2[] = $data[$i]['s2']*1;
            $s3[] = $data[$i]['s3']*1;
            $s4[] = $data[$i]['s4']*1;
            $s5[] = $data[$i]['s5']*1;
        }
        
       $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
            
        ]);
        return $this->render('index',[
            'dataProvider'=>$dataProvider,
            'sex'=>$sex,'s1'=>$s1,'s2'=>$s2,'s3'=>$s3,'s4'=>$s4,'s5'=>$s5,
        ]);
    }  
    
    public function actionOpd(){
        $date1 = "";
        $date2 = "";
        $tmbpart ="";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $tmbpart = $_POST['tmbpart'];
        }
        
        $sql = "select ovst.vstdate,pt.hn,pt.cid,CONCAT(pt.pname,pt.fname,' ',pt.lname) as ptname,ops.cc
            ,ov.pdx,i.name,i.tname,pt.informaddr,pt.hometel,
            pt.addrpart,pt.moopart,pt.tmbpart,ov.hospsub,ov.aid	
            FROM vn_stat ov, ovst ovst, patient pt, icd101 i, opdscreen ops
            WHERE pt.hn = ov.hn AND ov.vn = ovst.vn AND i.code = ov.pdx AND ops.vn=ov.vn AND
            ov.vstdate BETWEEN '$date1' AND '$date2' AND  ov.hospsub = '$tmbpart' and ov.pdx != 'B24'
            order by pt.moopart, ovst.vstdate asc";
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
        return $this->render('opd', [
                    'dataProvider' => $dataProvider,                    
                    'sql' => $sql,
                    'rawData'=>$rawData,
                    'date1' => $date1,
                    'date2' => $date2,
                    'tmbpart'=> $tmbpart
                    
        ]);
    }
    public function actionIpd(){
        $date1 = "";
        $date2 = "";
        $tmbpart ="";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $tmbpart = $_POST['tmbpart'];
        }
        
        $sql = "select a.an,p.hn,p.cid,CONCAT(p.pname,p.fname,'',p.lname) as ptname,
                p.informaddr,i.regdate,i.dchdate,a.pdx, icd.name, icd.tname,i.prediag,a.aid,o.hospsub
                from an_stat a
                left outer join patient p on p.hn=a.hn
                left outer join ipt i on i.an=a.an
                left outer join ovst o on o.an=a.an
                left outer join icd101 icd  on icd.code=a.pdx
                where a.dchdate between '$date1' and '$date2' and o.hospsub='$tmbpart' and a.age_y >= 0 and a.age_y <= 200  and a.pdx != 'B24'
                group by a.an
                order by a.dchdate asc";
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
        return $this->render('ipd', [
                    'dataProvider' => $dataProvider,                    
                    'sql' => $sql,
                    'rawData'=>$rawData,
                    'date1' => $date1,
                    'date2' => $date2,
                    'tmbpart'=> $tmbpart
                    
        ]);
    }
}
