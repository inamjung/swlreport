<?php

namespace app\modules\dpac\controllers;

use Yii;
use app\modules\dpac\models\PctAllVisit;
use app\modules\dpac\models\PctAllVisitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\dpac\models\Dpacdetails;

/**
 * PctAllVisitController implements the CRUD actions for PctAllVisit model.
 */
class PctAllVisitController extends Controller
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
     * Lists all PctAllVisit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PctAllVisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PctAllVisit model.
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
     * Creates a new PctAllVisit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PctAllVisit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vn]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PctAllVisit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $dpac=new DpacDetails();
        if ($model->load(Yii::$app->request->post())  ) {
        $dpac -> hn = $model->hn;
        
        $dpac -> hn = $model->hn;
            $dpac -> age = $model->age;
            $dpac -> name = $model->patientName;
            $dpac -> cid = $model->cid; //อัปเดท cid ให้ไปบันทึกที่ dpacdetail_cid
            $dpac -> cr = $model->cr;
            $dpac -> age = $model->age;
            $dpac -> ldl = $model->ldl;
            $dpac -> fbs = $model->fbs;
            $dpac -> bps = $model->bps;
            $dpac -> bpd = $model->bpd;
            $dpac -> bmi = $model->bmi;
            $dpac -> gfr_thai = $model->gfr_thai;
            $dpac -> gfr_ckd = $model->gfr_ckd;
            $dpac -> stage = $model->stage;
            $dpac -> cvd_risk = $model->cvd_risk;
            $dpac -> bmi = $model->bmi;
            $dpac -> waist = $model->waist;
            $dpac -> bloodgrp = $model->bloodgrp;
            $dpac -> weight = $model->bw;
            $dpac -> height = $model->height;
            $dpac -> birthday = $model->Birthday;
            $dpac -> informaddr = $model->Informaddr;

        $dpac->save();   
        $model->save();

            return $this->redirect(['view', 'id' => $model->vn]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PctAllVisit model.
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
     * Finds the PctAllVisit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PctAllVisit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PctAllVisit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
