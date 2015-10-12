<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use app\components\AccessRule;

class StrokemiController extends Controller
{
   public $enableCsrfValidation = false;
   public function actionIndex()
    {
        return $this->render('index');
    }
    
    
    public function actionMidx()
    {
       
        $sql = "select opd.vstdate,v.hn,concat(pa.pname,pa.fname,' ',pa.lname) as ptname,s.name as sex,v.age_y,v.pdx,  
             st.smoking_type_name as smoke,dt.drinking_type_name,CONCAT(pa.addrpart,'  หมู่ ',pa.moopart,'  ',th.full_name) as dd,
             pa.addrpart as 'ADD',pa.moopart as 'MOO',th.name as 'TUM',th.full_name as fullname 
             from vn_stat v  
             left outer join opdscreen opd on opd.vn=v.vn  
             join smoking_type st on st.smoking_type_id=opd.smoking_type_id  
             join drinking_type dt on dt.drinking_type_id=opd.drinking_type_id  
             join sex s on s.code=v.sex  
             left outer join patient pa on pa.hn=v.hn  and pa.death !='Y' AND pa.chwpart='38' AND pa.amppart='07'
             left outer join thaiaddress th on th.addressid=concat(pa.chwpart,pa.amppart,pa.tmbpart) 
             WHERE v.pdx BETWEEN 'I21' and 'I259' or v.pdx='I20'
             group by pa.hn 
             order by TUM ";
             
            
        $rawData = Yii::$app->db2->createCommand($sql)->queryAll();
        return $this->render('midx',[
            'rawData'=>$rawData
        ]);
    }
    
    public function actionStrokedx(){
        $sql = "select opd.vstdate,v.hn,concat(pa.pname,pa.fname,' ',pa.lname) as ptname,s.name as sex,v.age_y,v.pdx,  
             st.smoking_type_name as smoke,dt.drinking_type_name,CONCAT(pa.addrpart,'  หมู่ ',pa.moopart,'  ',th.full_name) as dd,
             pa.addrpart as 'ADD',pa.moopart as 'MOO',th.name as 'TUM',th.full_name as fullname 
             from vn_stat v  
             left outer join opdscreen opd on opd.vn=v.vn  
             join smoking_type st on st.smoking_type_id=opd.smoking_type_id  
             join drinking_type dt on dt.drinking_type_id=opd.drinking_type_id  
             join sex s on s.code=v.sex  
             left outer join patient pa on pa.hn=v.hn  and pa.death !='Y' AND pa.chwpart='38' AND pa.amppart='07'
             left outer join thaiaddress th on th.addressid=concat(pa.chwpart,pa.amppart,pa.tmbpart) 
             WHERE v.pdx BETWEEN 'I64' and 'I69'
             group by pa.hn 
             order by TUM ";
    $rawData = Yii::$app->db2->createCommand($sql)->queryAll();
        return $this->render('strokedx',[
            'rawData'=>$rawData
        ]);
    }
}