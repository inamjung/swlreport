<?php
namespace app\controllers;
use yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;

class AsthmaController extends Controller
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
                'only'=> ['index','Asthma1','Asthma2','Asthma3'],
                'ruleConfig'=>[
                    'class'=>AccessRule::className()
                ],
                'rules'=>[
                    [
                        'actions'=>['index','Asthma1','Asthma2','Asthma3'],
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
	public function actionAsthma1() {
        
        $date1 = "";
        $date2 = "";
      
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
           
        }
            $sql = "select r.refer_date as date,
			r.hn as hn,
			tv.ptname,
			CONCAT(tv.addrpart,' ','หมู๋',' ',tv.moopart,' ',tv.full_name) as address,
			r.pre_diagnosis as per,
			r.pdx as pdx,
			c.`name` as clinic,
			CONCAT(h.hosptype,h.`name`)as hosname,
			r.vn as vn
			FROM referout r
			LEFT OUTER JOIN clinicmember cm on cm.hn = r. hn 
			LEFT OUTER JOIN clinic  c on c.clinic = cm.clinic
			LEFT OUTER JOIN hospcode h on h.hospcode = r.refer_hospcode
      LEFT OUTER JOIN tem_vpatient AS tv ON tv.hn = r.hn
			WHERE cm.clinic in ('015','019') AND
			refer_date BETWEEN '$date1' and '$date2' ";
        
        try {
            $rawData = \Yii::$app->db2->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
           
            'allModels' => $rawData,
            'pagination' =>['pagesize'=>15]
        ]);
        return $this->render('Asthma1', [
                    'dataProvider' => $dataProvider,
                    
                    'sql' => $sql,
                    'rawData'=>$rawData,
                    'date1' => $date1,
                    'date2' => $date2,  
                   
        ]);
    }

	public function actionAsthma2(){
		
		$connection = Yii::$app->db2;
		$data = $connection->createCommand('
			SELECT
			opitemrece.vstdate,
			tv.hn,
			tv.ptname,
			CONCAT(tv.addrpart," ","หมู๋"," ",tv.moopart," ",tv.full_name) as address,
			opitemrece.icode,
			drugitems.`name` AS drugname,
			clinicmember.clinic,
			clinic.`name`,
			opitemrece.qty
			FROM
			tem_vpatient AS tv
			INNER JOIN opitemrece ON opitemrece.hn = tv.hn
			INNER JOIN drugitems ON drugitems.icode = opitemrece.icode
			INNER JOIN clinicmember ON clinicmember.hn = tv.hn
			INNER JOIN clinic ON clinic.clinic = clinicmember.clinic
			and clinicmember.clinic in ("015","019")
			where opitemrece.icode in("1481225","1460317")
			/*AND o.an is NULL*/
			and opitemrece.vstdate BETWEEN "2014-01-01"AND"2014-03-31"
			group by vn
			ORDER BY opitemrece.vstdate
			')->queryAll();

		$dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
            //'sort'=>[
             //   'attributes'=>['vstdate','hn','ptname','full_name','icode','name','name1','qty']
           // ],
            'pagination'=>['pagesize'=>15]
        ]);
        return $this->render('Asthma2',[
            'dataProvider'=>$dataProvider,

            //'date1'=>$date1,'date2'=>$date2,

            //'yy'=>@yy,'mm'=>$mm,'cnt'=>$cnt,
        ]);
	}

	public function actionAsthma3(){
		$connection = Yii::$app->db2;
		$data = $connection->createCommand('
			SELECT
			a.regdate,
			a.hn,
			c.clinic,
			tv.ptname,
			CONCAT(tv.addrpart," ","หมู๋"," ",tv.moopart," ",tv.full_name) as address,
			a.pdx,
			d.`name`
			FROM
			an_stat AS a
			LEFT OUTER JOIN clinicmember AS cm ON cm.hn = a.hn
			LEFT OUTER JOIN clinic AS c ON c.clinic = cm.clinic
			LEFT OUTER JOIN doctor AS d ON d.`code` = a.dx_doctor
			INNER JOIN tem_vpatient AS tv ON tv.hn = a.hn
			WHERE cm.clinic in ("015","019") AND
			a.regdate BETWEEN "2014-01-01"and"2014-03-31"
			order by a.regdate
			')->queryAll();

		$dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
            //'sort'=>[
             //   'attributes'=>['vstdate','hn','ptname','full_name','icode','name','name1','qty']
           // ],
            'pagination'=>['pagesize'=>15]
        ]);
        return $this->render('Asthma3',[
            'dataProvider'=>$dataProvider,

            //'date1'=>$date1,'date2'=>$date2,

            //'yy'=>@yy,'mm'=>$mm,'cnt'=>$cnt,
        ]);
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



}