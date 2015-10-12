<?php

namespace app\controllers;

use Yii;
use app\models\PctClinicVisit;
use app\models\PctClinicVisitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

//model
use app\models\Pctpatient;

/**
 * PctClinicVisitController implements the CRUD actions for PctClinicVisit model.
 */
class PctClinicVisitController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all PctClinicVisit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PctClinicVisitSearch(['hosconfirm'=>'0']);
       
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PctClinicVisit model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PctClinicVisit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PctClinicVisit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vn]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PctClinicVisit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
              $model = $this->findModel($id);
        

        $pct = new Pctpatient;
        if ($model->load(Yii::$app->request->post())) { 
            $pct->hn = $model->hn;
            $pct->cid = $model->patientcid;
            $pct->name = $model->patientName;
            $pct->tmbpart_id = $model->patienttmbpart;
            $pct->addrpart = $model->patientaddrpart;
            $pct->moo = $model->patientmoopart;
            $pct->cvd_risk = $model->cvd_risk;
            $pct->stage = $model->stage;
            $pct->pdx1 = $model->icd10;
            $pct->ptype = $model->sendto;
            $pct->age = $model->age;
            $pct->sex = $model->patientsex; 
            $pct->tel = $model->patientinformtel;
            $pct->birthday = $model->patientbirthday;
            $pct->pstatus = '0';
            $pct->save();
            
            $model->save();
            
            
           //return $this->redirect('?r=pct-clinic-visit/indexhosconfirm');
           return $this->redirect('?r=pctpatient');
        } else {
            return $this->renderAjax('update', [
                        'model' => $model,
            ]);
        }
    }
    
    public function actionUpdatehos($id) {
        $model = $this->findModel($id);

       
        if ($model->load(Yii::$app->request->post())) {
           
            
            $model->save();
             return $this->redirect(['pct-clinic-visit/index']);
        } else {
            return $this->renderAjax('updatehos', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PctClinicVisit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PctClinicVisit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PctClinicVisit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PctClinicVisit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionIndexhosconfirm() {
        $searchModel = new PctClinicVisitSearch(['ssoconfirm'=>'0']);
        $searchModel->hosconfirm = '1';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('indexhosconfirm', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
   
   public function actionIndivhosconfirm($hn = null){
        
        $sql = "SELECT * FROM pct_clinic_visit pc
                WHERE hn='$hn'
                ORDER BY vn DESC";        
       
           $rawData = \Yii::$app->db2->createCommand($sql)->queryAll(); 
        try {
            $rawData = \Yii::$app->db2->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        return $this->renderAjax('indexvn', [
                    'rawData' => $rawData,
                    'sql' => $sql,
                    'hn' => $hn,                  
                    
        ]);
    }
    public function actionIndivhosdrug($vn = null){
        
        $sql = "SELECT pc.vstdate, pc.vn,pc.hn,pd.icode, CONCAT(d.`name` ,' ',d.strength) as vndrug 
                FROM pct_drug_clinic_visit pd
                INNER JOIN drugitems d on d.icode=pd.icode
                INNER JOIN pct_clinic_visit pc on pc.vn=pd.vn
                WHERE pc.vn='$vn'
                ORDER BY pc.vn DESC";        
       
           $rawData = \Yii::$app->db2->createCommand($sql)->queryAll(); 
        try {
            $rawData = \Yii::$app->db2->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        
        return $this->render('indexdrug', [
                    'rawData' => $rawData,
                    'sql' => $sql,
                    'vn' => $vn,                  
                    
        ]);
    } 
}
