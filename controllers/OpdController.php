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


class OpdController extends Controller
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
                'only'=> ['index','referincenter','referininprov','referinoutprovin8',
                    'referinoutprovout8','referoutInprov','referoutcenter','referoutoutprovin8','referoutoutprovout8'],
                'ruleConfig'=>[
                    'class'=>AccessRule::className()
                ],
                'rules'=>[
                    [
                        'actions'=>['index','referincenter','referininprov','referinoutprovin8',
                    'referinoutprovout8','referoutInprov','referoutcenter','referoutoutprovin8','referoutoutprovout8'],
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
        return $this->render('index');
    }
    public function actionReferoutInprov(){
        $connection = Yii::$app->db2;
        $data = $connection->createCommand('
           SELECT year(r.refer_date) as years 
            , sum((month(r.refer_date)) ="01") as jan
            , sum((month(r.refer_date)) ="02") as feb
            , sum((month(r.refer_date)) ="03") as mar
            , sum((month(r.refer_date)) ="04") as apr
            , sum((month(r.refer_date)) ="05") as may
            , sum((month(r.refer_date)) ="06") as jun
            , sum((month(r.refer_date)) ="07") as july
            , sum((month(r.refer_date)) ="08") as aug
            , sum((month(r.refer_date)) ="09") as sep
            , sum((month(r.refer_date)) ="10") as oct
            , sum((month(r.refer_date)) ="11") as nov
            , sum((month(r.refer_date)) ="12") as dece
            FROM referout r
            WHERE r.refer_hospcode in ("11040","11041","11043","11046","11047","11048","11050")
            GROUP BY year(r.refer_date)
            ORDER BY year(r.refer_date) DESC
            ')->queryAll();
        //เตรียมข้อมูลส่งให้กราฟ
        for($i=0;$i<sizeof($data);$i++){
            $years[] = $data[$i]['years'];           
            $jan[] = $data[$i]['jan']*1;
            $feb[] = $data[$i]['feb']*1;
            $mar[] = $data[$i]['mar']*1;
            $apr[] = $data[$i]['apr']*1;
            $may[] = $data[$i]['may']*1;
            $jun[] = $data[$i]['jun']*1;
            $july[] = $data[$i]['july']*1;
            $aug[] = $data[$i]['aug']*1;
            $sep[] = $data[$i]['sep']*1;
            $oct[] = $data[$i]['oct']*1;
            $nov[] = $data[$i]['nov']*1;
            $dece[] = $data[$i]['dece']*1;
        }
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
//            'sort'=>[""
//                'attributes'=>['years']
//            ],
        ]);
        return $this->render('referoutInprov',[
            'dataProvider'=>$dataProvider,
            'years'=>$years,'jan'=>$jan,'feb'=>$feb,'mar'=>$mar,
            'apr'=>$apr,'may'=>$may,'jun'=>$jun,'july'=>$july,
            'aug'=>$aug,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,
            'dece'=>$dece,
        ]);
    }
    
    public function actionReferoutOutprovIn8(){
        $connection = Yii::$app->db2;
        $data = $connection->createCommand('
           SELECT year(ro.refer_date) as years
            , sum((month(ro.refer_date)) ="01") as jan
            , sum((month(ro.refer_date)) ="02") as feb
            , sum((month(ro.refer_date)) ="03") as mar
            , sum((month(ro.refer_date)) ="04") as apr
            , sum((month(ro.refer_date)) ="05") as may
            , sum((month(ro.refer_date)) ="06") as jun
            , sum((month(ro.refer_date)) ="07") as july
            , sum((month(ro.refer_date)) ="08") as aug
            , sum((month(ro.refer_date)) ="09") as sep
            , sum((month(ro.refer_date)) ="10") as oct
            , sum((month(ro.refer_date)) ="11") as nov
            , sum((month(ro.refer_date)) ="12") as dece
            FROM referout ro
            LEFT JOIN hospcode ho ON ho.hospcode=ro.refer_hospcode
            WHERE ho.chwpart  in(SELECT chwpart FROM hospcode WHERE 
             chwpart="39" or chwpart="41"or chwpart="42"or chwpart="43"
            or chwpart="47"or chwpart="48")
            AND ro.refer_type="2"
            GROUP BY year(ro.refer_date)
            ORDER BY year(ro.refer_date) DESC
            ')->queryAll();
        //เตรียมข้อมูลส่งให้กราฟ
        for($i=0;$i<sizeof($data);$i++){
            $years[] = $data[$i]['years'];           
            $jan[] = $data[$i]['jan']*1;
            $feb[] = $data[$i]['feb']*1;
            $mar[] = $data[$i]['mar']*1;
            $apr[] = $data[$i]['apr']*1;
            $may[] = $data[$i]['may']*1;
            $jun[] = $data[$i]['jun']*1;
            $july[] = $data[$i]['july']*1;
            $aug[] = $data[$i]['aug']*1;
            $sep[] = $data[$i]['sep']*1;
            $oct[] = $data[$i]['oct']*1;
            $nov[] = $data[$i]['nov']*1;
            $dece[] = $data[$i]['dece']*1;
        }
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);
        return $this->render('referoutOutprovIn8',[
            'dataProvider'=>$dataProvider,
            'years'=>$years,'jan'=>$jan,'feb'=>$feb,'mar'=>$mar,
            'apr'=>$apr,'may'=>$may,'jun'=>$jun,'july'=>$july,
            'aug'=>$aug,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,
            'dece'=>$dece,
        ]);
    }
    public function actionReferoutOutprovOut8(){
        $connection = Yii::$app->db2;
        $data = $connection->createCommand('
           SELECT year(ro.refer_date) as years
            , sum((month(ro.refer_date)) ="01") as jan
            , sum((month(ro.refer_date)) ="02") as feb
            , sum((month(ro.refer_date)) ="03") as mar
            , sum((month(ro.refer_date)) ="04") as apr
            , sum((month(ro.refer_date)) ="05") as may
            , sum((month(ro.refer_date)) ="06") as jun
            , sum((month(ro.refer_date)) ="07") as july
            , sum((month(ro.refer_date)) ="08") as aug
            , sum((month(ro.refer_date)) ="09") as sep
            , sum((month(ro.refer_date)) ="10") as oct
            , sum((month(ro.refer_date)) ="11") as nov
            , sum((month(ro.refer_date)) ="12") as dece
            FROM referout ro
            LEFT JOIN hospcode ho ON ho.hospcode=ro.refer_hospcode
            WHERE ho.chwpart not in(SELECT chwpart FROM hospcode WHERE chwpart="38" 
            or chwpart="39" or chwpart="41"or chwpart="42"or chwpart="43"
            or chwpart="47"or chwpart="48")
            AND ro.refer_type="2"
            GROUP BY year(ro.refer_date)
            ORDER BY year(ro.refer_date) DESC
            ')->queryAll();
        //เตรียมข้อมูลส่งให้กราฟ
        for($i=0;$i<sizeof($data);$i++){
            $years[] = $data[$i]['years'];           
            $jan[] = $data[$i]['jan']*1;
            $feb[] = $data[$i]['feb']*1;
            $mar[] = $data[$i]['mar']*1;
            $apr[] = $data[$i]['apr']*1;
            $may[] = $data[$i]['may']*1;
            $jun[] = $data[$i]['jun']*1;
            $july[] = $data[$i]['july']*1;
            $aug[] = $data[$i]['aug']*1;
            $sep[] = $data[$i]['sep']*1;
            $oct[] = $data[$i]['oct']*1;
            $nov[] = $data[$i]['nov']*1;
            $dece[] = $data[$i]['dece']*1;
        }
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);
        return $this->render('referoutOutprovOut8',[
            'dataProvider'=>$dataProvider,
            'years'=>$years,'jan'=>$jan,'feb'=>$feb,'mar'=>$mar,
            'apr'=>$apr,'may'=>$may,'jun'=>$jun,'july'=>$july,
            'aug'=>$aug,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,
            'dece'=>$dece,
        ]);
    }
    public function actionReferoutCenter(){
        $connection = Yii::$app->db2;
        $data = $connection->createCommand('
           SELECT year(ro.refer_date) as years
            , sum((month(ro.refer_date)) ="01") as jan
            , sum((month(ro.refer_date)) ="02") as feb
            , sum((month(ro.refer_date)) ="03") as mar
            , sum((month(ro.refer_date)) ="04") as apr
            , sum((month(ro.refer_date)) ="05") as may
            , sum((month(ro.refer_date)) ="06") as jun
            , sum((month(ro.refer_date)) ="07") as july
            , sum((month(ro.refer_date)) ="08") as aug
            , sum((month(ro.refer_date)) ="09") as sep
            , sum((month(ro.refer_date)) ="10") as oct
            , sum((month(ro.refer_date)) ="11") as nov
            , sum((month(ro.refer_date)) ="12") as dece
            FROM referout ro
            LEFT JOIN hospcode ho ON ho.hospcode=ro.refer_hospcode
            WHERE ho.chwpart  in(SELECT chwpart FROM hospcode WHERE chwpart="7" 
            or chwpart="12" or chwpart="11"or chwpart="13"or chwpart="74"
            or chwpart="10")
            AND ro.refer_type="2"
            GROUP BY year(ro.refer_date)
            ORDER BY year(ro.refer_date) DESC
            ')->queryAll();
        //เตรียมข้อมูลส่งให้กราฟ
        for($i=0;$i<sizeof($data);$i++){
            $years[] = $data[$i]['years'];           
            $jan[] = $data[$i]['jan']*1;
            $feb[] = $data[$i]['feb']*1;
            $mar[] = $data[$i]['mar']*1;
            $apr[] = $data[$i]['apr']*1;
            $may[] = $data[$i]['may']*1;
            $jun[] = $data[$i]['jun']*1;
            $july[] = $data[$i]['july']*1;
            $aug[] = $data[$i]['aug']*1;
            $sep[] = $data[$i]['sep']*1;
            $oct[] = $data[$i]['oct']*1;
            $nov[] = $data[$i]['nov']*1;
            $dece[] = $data[$i]['dece']*1;
        }
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);
        return $this->render('referoutCenter',[
            'dataProvider'=>$dataProvider,
            'years'=>$years,'jan'=>$jan,'feb'=>$feb,'mar'=>$mar,
            'apr'=>$apr,'may'=>$may,'jun'=>$jun,'july'=>$july,
            'aug'=>$aug,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,
            'dece'=>$dece,
        ]);
    }
    public function actionReferinInprov(){
        $connection = Yii::$app->db2;
        $data = $connection->createCommand('
           SELECT year(r.refer_date) as years
            , sum((month(r.refer_date)) ="01") as jan
            , sum((month(r.refer_date)) ="02") as feb
            , sum((month(r.refer_date)) ="03") as mar
            , sum((month(r.refer_date)) ="04") as apr
            , sum((month(r.refer_date)) ="05") as may
            , sum((month(r.refer_date)) ="06") as jun
            , sum((month(r.refer_date)) ="07") as july
            , sum((month(r.refer_date)) ="08") as aug
            , sum((month(r.refer_date)) ="09") as sep
            , sum((month(r.refer_date)) ="10") as oct
            , sum((month(r.refer_date)) ="11") as nov
            , sum((month(r.refer_date)) ="12") as dece

            FROM referin r
            WHERE r.refer_hospcode in ("11040","11041","11043","11046","11047","11048","11050")
            GROUP BY year(r.refer_date)
            ORDER BY year(r.refer_date) DESC
            ')->queryAll();
        //เตรียมข้อมูลส่งให้กราฟ
        for($i=0;$i<sizeof($data);$i++){
            $years[] = $data[$i]['years'];           
            $jan[] = $data[$i]['jan']*1;
            $feb[] = $data[$i]['feb']*1;
            $mar[] = $data[$i]['mar']*1;
            $apr[] = $data[$i]['apr']*1;
            $may[] = $data[$i]['may']*1;
            $jun[] = $data[$i]['jun']*1;
            $july[] = $data[$i]['july']*1;
            $aug[] = $data[$i]['aug']*1;
            $sep[] = $data[$i]['sep']*1;
            $oct[] = $data[$i]['oct']*1;
            $nov[] = $data[$i]['nov']*1;
            $dece[] = $data[$i]['dece']*1;
        }
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);
        return $this->render('referinInprov',[
            'dataProvider'=>$dataProvider,
            'years'=>$years,'jan'=>$jan,'feb'=>$feb,'mar'=>$mar,
            'apr'=>$apr,'may'=>$may,'jun'=>$jun,'july'=>$july,
            'aug'=>$aug,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,
            'dece'=>$dece,
        ]);
    }
    public function actionReferinOutprovIn8(){
        $connection = Yii::$app->db2;
        $data = $connection->createCommand('
           SELECT year(r.refer_date) as years
            , sum((month(r.refer_date)) ="01") as jan
            , sum((month(r.refer_date)) ="02") as feb
            , sum((month(r.refer_date)) ="03") as mar
            , sum((month(r.refer_date)) ="04") as apr
            , sum((month(r.refer_date)) ="05") as may
            , sum((month(r.refer_date)) ="06") as jun
            , sum((month(r.refer_date)) ="07") as july
            , sum((month(r.refer_date)) ="08") as aug
            , sum((month(r.refer_date)) ="09") as sep
            , sum((month(r.refer_date)) ="10") as oct
            , sum((month(r.refer_date)) ="11") as nov
            , sum((month(r.refer_date)) ="12") as dece
            FROM referin r
            LEFT JOIN hospcode ho ON ho.hospcode=r.refer_hospcode

            WHERE ho.chwpart  in(SELECT chwpart FROM hospcode WHERE  
             chwpart="39" or chwpart="41"or chwpart="42"or chwpart="43"
            or chwpart="47"or chwpart="48")
            GROUP BY year(r.refer_date)
            ORDER BY year(r.refer_date) DESC
            ')->queryAll();
        //เตรียมข้อมูลส่งให้กราฟ
        for($i=0;$i<sizeof($data);$i++){
            $years[] = $data[$i]['years'];           
            $jan[] = $data[$i]['jan']*1;
            $feb[] = $data[$i]['feb']*1;
            $mar[] = $data[$i]['mar']*1;
            $apr[] = $data[$i]['apr']*1;
            $may[] = $data[$i]['may']*1;
            $jun[] = $data[$i]['jun']*1;
            $july[] = $data[$i]['july']*1;
            $aug[] = $data[$i]['aug']*1;
            $sep[] = $data[$i]['sep']*1;
            $oct[] = $data[$i]['oct']*1;
            $nov[] = $data[$i]['nov']*1;
            $dece[] = $data[$i]['dece']*1;
        }
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);
        return $this->render('referinoutprovin8',[
            'dataProvider'=>$dataProvider,
            'years'=>$years,'jan'=>$jan,'feb'=>$feb,'mar'=>$mar,
            'apr'=>$apr,'may'=>$may,'jun'=>$jun,'july'=>$july,
            'aug'=>$aug,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,
            'dece'=>$dece,
        ]);
    }
    public function actionReferinOutprovOut8(){
        $connection = Yii::$app->db2;
        $data = $connection->createCommand('
           SELECT year(r.refer_date) as years
            , sum((month(r.refer_date)) ="01") as jan
            , sum((month(r.refer_date)) ="02") as feb
            , sum((month(r.refer_date)) ="03") as mar
            , sum((month(r.refer_date)) ="04") as apr
            , sum((month(r.refer_date)) ="05") as may
            , sum((month(r.refer_date)) ="06") as jun
            , sum((month(r.refer_date)) ="07") as july
            , sum((month(r.refer_date)) ="08") as aug
            , sum((month(r.refer_date)) ="09") as sep
            , sum((month(r.refer_date)) ="10") as oct
            , sum((month(r.refer_date)) ="11") as nov
            , sum((month(r.refer_date)) ="12") as dece
            FROM referin r
            LEFT JOIN hospcode ho ON ho.hospcode=r.refer_hospcode

            WHERE ho.chwpart not in(SELECT chwpart FROM hospcode WHERE chwpart="38" 
            or chwpart="39" or chwpart="41"or chwpart="42"or chwpart="43"
            or chwpart="47"or chwpart="48")
            GROUP BY year(r.refer_date)
            ORDER BY year(r.refer_date) DESC
            ')->queryAll();
        //เตรียมข้อมูลส่งให้กราฟ
        for($i=0;$i<sizeof($data);$i++){
            $years[] = $data[$i]['years'];           
            $jan[] = $data[$i]['jan']*1;
            $feb[] = $data[$i]['feb']*1;
            $mar[] = $data[$i]['mar']*1;
            $apr[] = $data[$i]['apr']*1;
            $may[] = $data[$i]['may']*1;
            $jun[] = $data[$i]['jun']*1;
            $july[] = $data[$i]['july']*1;
            $aug[] = $data[$i]['aug']*1;
            $sep[] = $data[$i]['sep']*1;
            $oct[] = $data[$i]['oct']*1;
            $nov[] = $data[$i]['nov']*1;
            $dece[] = $data[$i]['dece']*1;
        }
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);
        return $this->render('referinoutprovout8',[
            'dataProvider'=>$dataProvider,
            'years'=>$years,'jan'=>$jan,'feb'=>$feb,'mar'=>$mar,
            'apr'=>$apr,'may'=>$may,'jun'=>$jun,'july'=>$july,
            'aug'=>$aug,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,
            'dece'=>$dece,
        ]);
    }
    
    public function actionReferinCenter(){
        $connection = Yii::$app->db2;
        $data = $connection->createCommand('
           SELECT year(r.refer_date) as years
            , sum((month(r.refer_date)) ="01") as jan
            , sum((month(r.refer_date)) ="02") as feb
            , sum((month(r.refer_date)) ="03") as mar
            , sum((month(r.refer_date)) ="04") as apr
            , sum((month(r.refer_date)) ="05") as may
            , sum((month(r.refer_date)) ="06") as jun
            , sum((month(r.refer_date)) ="07") as july
            , sum((month(r.refer_date)) ="08") as aug
            , sum((month(r.refer_date)) ="09") as sep
            , sum((month(r.refer_date)) ="10") as oct
            , sum((month(r.refer_date)) ="11") as nov
            , sum((month(r.refer_date)) ="12") as dece
            FROM referin r
            LEFT JOIN hospcode ho ON ho.hospcode=r.refer_hospcode

            WHERE ho.chwpart  in(SELECT chwpart FROM hospcode WHERE chwpart="7" 
            or chwpart="12" or chwpart="11"or chwpart="13"or chwpart="74"
            or chwpart="10")
            GROUP BY year(r.refer_date)
            ORDER BY year(r.refer_date) DESC
            ')->queryAll();
        //เตรียมข้อมูลส่งให้กราฟ
        for($i=0;$i<sizeof($data);$i++){
            $years[] = $data[$i]['years'];           
            $jan[] = $data[$i]['jan']*1;
            $feb[] = $data[$i]['feb']*1;
            $mar[] = $data[$i]['mar']*1;
            $apr[] = $data[$i]['apr']*1;
            $may[] = $data[$i]['may']*1;
            $jun[] = $data[$i]['jun']*1;
            $july[] = $data[$i]['july']*1;
            $aug[] = $data[$i]['aug']*1;
            $sep[] = $data[$i]['sep']*1;
            $oct[] = $data[$i]['oct']*1;
            $nov[] = $data[$i]['nov']*1;
            $dece[] = $data[$i]['dece']*1;
        }
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);
        return $this->render('referincenter',[
            'dataProvider'=>$dataProvider,
            'years'=>$years,'jan'=>$jan,'feb'=>$feb,'mar'=>$mar,
            'apr'=>$apr,'may'=>$may,'jun'=>$jun,'july'=>$july,
            'aug'=>$aug,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,
            'dece'=>$dece,
        ]);
    }
}

