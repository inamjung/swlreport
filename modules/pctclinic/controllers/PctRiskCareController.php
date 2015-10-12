<?php

namespace app\modules\pctclinic\controllers;

use Yii;
use app\modules\pctclinic\models\PctRiskCare;
use app\modules\pctclinic\models\PctRiskCareSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\modules\pctclinic\models\PctRisk;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;

/**
 * PctRiskCareController implements the CRUD actions for PctRiskCare model.
 */
class PctRiskCareController extends Controller
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
     * Lists all PctRiskCare models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PctRiskCareSearch(['rpstok'=>0]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PctRiskCare model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PctRiskCare model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PctRiskCare();

         if ($model->load(Yii::$app->request->post())) {
            $model->createdate = date('Y-m-d');
            
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PctRiskCare model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

           
        
        if ($model->load(Yii::$app->request->post())) {            
            
            $model->save();
            
           return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }
    
    

    /**
     * Deletes an existing PctRiskCare model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PctRiskCare model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PctRiskCare the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PctRiskCare::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
