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


class CvdriskController extends Controller
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
    
    
    public function actionCvdrisk0() {
        $date1 = "";
        $date2 = "";
        $tmbpart ="";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $tmbpart = $_POST['tmbpart'];
        }
        
        $sql = "select v.vn,v.hn,concat(pt.pname,pt.fname,' ',pt.lname) ptname,pt.informaddr as adrfull
            ,pt.tmbpart,pt.moopart,v.vstdate,group_concat(distinct odx.icd10) icd10 
            ,if(v.sex=1,'ชาย','หญิง') sex,v.age_y as age 
            ,concat(floor(s.bps),'/',floor(s.bpd)) 'bp' 
            ,if(s.tc>0,'Y','N') has,s.tc 
            ,if(s.smoking_type_id=2,'Y','N') smoke 
            ,if(cm.hn is null,'N','Y') chronic 
            ,group_concat(distinct if(cm.clinic=001,'DM',if(cm.clinic=002,'HT',null))) NCD 
            ,(select color from colorchart where has=if(s.tc>0,'Y','N') 
            and chronic=if(cm.hn is not null,'Y','N') 
            and sex=v.sex 
            and age=if(v.age_y>=70,70,if(v.age_y>=60,60,if(v.age_y>=50,50,40))) 
            and smoke=if(s.smoking_type_id=2,'Y','N') 
            and bp=if(s.bps>=180,180,if(s.bps>=160,160,if(s.bps>=140,140,120))) 
            and cholesterol=if(s.tc>=320,320,if(s.tc>=280,280,if(s.tc>=240,240,if(s.tc>=200,200,160)))) limit 1)stage

            from vn_stat v 
            left join patient pt on pt.hn=v.hn 
            left join opdscreen s on s.vn=v.vn 
            join clinicmember cm on v.hn=cm.hn and cm.clinic=001 
            left join ovstdiag odx on v.vn=odx.vn 
            where v.vstdate between '$date1' and '$date2'
            and s.tc>0
            and pt.tmbpart='$tmbpart' and pt.tmbpart<>''
            and (odx.icd10 between 'E10' and 'E1499') 
            group by v.hn order by stage desc ";
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
        return $this->render('cvdrisk0', [
                    'dataProvider' => $dataProvider,                    
                    'sql' => $sql,
                    'rawData'=>$rawData,
                    'date1' => $date1,
                    'date2' => $date2,
                    'tmbpart'=> $tmbpart
                    
        ]);
    }
    public function actionCvdrisk01() {
        $date1 = "";
        $date2 = "";
        $tmbpart ="";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $tmbpart = $_POST['tmbpart'];
        }
        
        $sql = "select v.vn,v.hn,concat(pt.pname,pt.fname,' ',pt.lname) ptname,pt.informaddr as adrfull
            ,pt.tmbpart,pt.moopart,v.vstdate,group_concat(distinct odx.icd10) icd10 
            ,if(v.sex=1,'ชาย','หญิง') sex,v.age_y as age 
            ,concat(floor(s.bps),'/',floor(s.bpd)) 'bp' 
            ,if(s.tc>0,'Y','N') has,s.tc 
            ,if(s.smoking_type_id=2,'Y','N') smoke 
            ,if(cm.hn is null,'N','Y') chronic 
            ,group_concat(distinct if(cm.clinic=001,'DM',if(cm.clinic=002,'HT',null))) NCD 
            ,(select color from colorchart where has=if(s.tc>0,'Y','N') 
            and chronic=if(cm.hn is not null,'Y','N') 
            and sex=v.sex 
            and age=if(v.age_y>=70,70,if(v.age_y>=60,60,if(v.age_y>=50,50,40))) 
            and smoke=if(s.smoking_type_id=2,'Y','N') 
            and bp=if(s.bps>=180,180,if(s.bps>=160,160,if(s.bps>=140,140,120))) 
            and cholesterol=if(s.tc>=320,320,if(s.tc>=280,280,if(s.tc>=240,240,if(s.tc>=200,200,160)))) limit 1)stage

            from vn_stat v 
            left join patient pt on pt.hn=v.hn 
            left join opdscreen s on s.vn=v.vn 
            join clinicmember cm on v.hn=cm.hn and cm.clinic=002 
            left join ovstdiag odx on v.vn=odx.vn 
            where v.vstdate between '$date1' and '$date2'
            and s.tc>0
            and pt.tmbpart='$tmbpart' and pt.tmbpart<>''
            and odx.icd10 ='I10'
            group by v.hn order by stage desc ";
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
        return $this->render('cvdrisk01', [
                    'dataProvider' => $dataProvider,                    
                    'sql' => $sql,
                    'rawData'=>$rawData,
                    'date1' => $date1,
                    'date2' => $date2,
                    'tmbpart'=> $tmbpart
                    
        ]);
    }
    
}
