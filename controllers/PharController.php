<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;


class PharController extends Controller
{
   public $enableCsrfValidation = false;
   
   public function actionIndex()
    {
        $connection = Yii::$app->db2;
        $data = $connection->createCommand('
           SELECT COUNT(icode) as total
            ,sum(( drugaccount)="") as ned
            ,sum(( drugaccount)<>"") as edtotal
            ,sum(( did)like"4%") as edttm
            ,sum(( drugaccount)<>"")-sum(( did)like"4%") as ed
            ,round((sum(( drugaccount)=""))*100/(COUNT(icode)),2) as per_ned
            ,round((sum(( drugaccount)<>""))*100/(COUNT(icode)),2) as per_ed
            FROM drugitems 
            WHERE istatus="Y"
            ')->queryAll();
        //เตรียมข้อมูลส่งให้กราฟ
        for($i=0;$i<sizeof($data);$i++){
            $total[] = $data[$i]['total'];           
            $ned[] = $data[$i]['ned']*1;
            $edtotal[] = $data[$i]['edtotal']*1;
            $ed[] = $data[$i]['ed']*1;
            $edttm[] = $data[$i]['edttm']*1;
            $per_ned[] = $data[$i]['per_ned']*1;              
            $per_ed[] = $data[$i]['per_ed']*1;
        }
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
//            'sort'=>[""
//                //'attributes'=>['y']
//            ],
        ]);
        return $this->render('index',[
            'dataProvider'=>$dataProvider,
            'total'=>$total,'ned'=>$ned,'edtotal'=>$edtotal,'ed'=>$ed,'edttm'=>$edttm,'per_ned'=>$per_ned,'per_ed'=>$per_ed
        ]);
    }
    public function actionUri(){
        $date1 = "";
        $date2 = "";    
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
        
        $sql = "select distinct(o.doctor) as doctor ,d1.`name` as doc 
,COUNT( case when v.vn  then v.vn=o.vn else null end)as total
,COUNT( case when d.antibiotic='Y'  then v.vn=o.vn else null end)as atb
      from ovstdiag o 
			JOIN doctor d1 on d1.`code`=o.doctor
      join vn_stat v on v.vn=o.vn 
      join patient p on p.hn=v.hn 
			JOIN opitemrece op on op.vn=v.vn
			JOIN drugitems d on d.icode=op.icode 			
      where o.icd10 in ('B053','H650','H651','H659','H660','H664','H669','H670','H671','H678','H720','H721','H722','H728','H729', 
      'J00','J010','J011','J012','J013','J014','J018','J019','J020','J029','J030','J038','J039','J040','J041','J042','J050','J051','J060','J068','J069', 
      'J101','J111','J200','J201','J202','J203','J204','J205','J206','J207','J208','J209','J210','J218','J219')       
			and v.vstdate between '$date1' and '$date2'
      GROUP BY doctor order by atb desc";
        try {
            $rawData = \Yii::$app->db2->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        
//        for($i=0;$i<sizeof($sql);$i++){
//             $tambonname[] = $sql[$i]['tambonname'];
//             $total[] = $sql[$i]['total']*1;
//             
//         }
         
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'ampurname',
            'allModels' => $rawData,
            'pagination' =>false,
            
        ]);
        //Yii::$app->session->setFlash('danger', 'รจำนวนผู้ป่วย Stoke แยกรายตำบล !');
        return $this->render('uri', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    'date1' => $date1,
                    'date2' => $date2,
                    
                    

        ]);
    }
   public function actionDiarrhea(){
        $date1 = "";
        $date2 = "";    
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
        
        $sql = "select distinct(o.doctor) as doctor ,d1.`name` as doc 
,COUNT( case when v.vn  then v.vn=o.vn else null end)as total
,COUNT( case when d.antibiotic='Y'  then v.vn=o.vn else null end)as atb
      from ovstdiag o 
			JOIN doctor d1 on d1.`code`=o.doctor
      join vn_stat v on v.vn=o.vn 
      join patient p on p.hn=v.hn 
			JOIN opitemrece op on op.vn=v.vn
			JOIN drugitems d on d.icode=op.icode 			
      where o.icd10 in ('A000','A001','A009','A020','A030','A031','A032','A033','A038','A039','A040','A041','A042','A043', 
      'A044','A045','A046','A047','A048','A049','A050','A053','A054','A059','A081','A082','A083','A084','A085','A090','A099','K521','K529')      
			and v.vstdate between '$date1' and '$date2'
      GROUP BY doctor order by atb desc";
        try {
            $rawData = \Yii::$app->db2->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        
//        for($i=0;$i<sizeof($sql);$i++){
//             $tambonname[] = $sql[$i]['tambonname'];
//             $total[] = $sql[$i]['total']*1;
//             
//         }
         
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'ampurname',
            'allModels' => $rawData,
            'pagination' =>false,
            
        ]);
        Yii::$app->session->setFlash('danger', 'รจำนวนผู้ป่วย Stoke แยกรายตำบล !');
        return $this->render('diarrhea', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    'date1' => $date1,
                    'date2' => $date2,
                    
                    

        ]);
    }
}