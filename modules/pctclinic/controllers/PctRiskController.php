<?php

namespace app\modules\pctclinic\controllers;

use Yii;
use app\modules\pctclinic\models\PctRisk;
use app\modules\pctclinic\models\PctRiskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\web\UploadedFile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;
use yii\data\ArrayDataProvider;
//use app\modules\pctclinic\models\Uploads;
use app\modules\pctclinic\models\Pctaddress;
use app\modules\pctclinic\models\PctRiskCare;
use app\modules\pctclinic\models\Uploadpctrisk;

/**
 * PctRiskController implements the CRUD actions for PctRisk model.
 */
class PctRiskController extends Controller
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
     * Lists all PctRisk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PctRiskSearch(['confirmin'=>'0']);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
     public function actionIndexview()
    {
        $searchModel = new PctRiskSearch(['confirmin'=>'1']);
        $searchModel->rpstok='1';
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('indexview', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PctRisk model.
     * @param integer $id
     * @return mixed
     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//            
//        ]);
//    }
    
    public function actionView($id)
    {
        $sql = "SELECT id,hn,cid,name,pdx1,latitude,longitude FROM pct_risk WHERE id='$id' ";
 		$connection = Yii::$app->db;
 		$data = $connection->createCommand($sql)->queryAll();

         for($i=0;$i<sizeof($data);$i++){
             $name[] = $data[$i]['name'];
             $cid[] = $data[$i]['cid'];
             $pdx1[] = $data[$i]['pdx1'];
             $latitude[] = $data[$i]['latitude']*1;
             $longitude[] = $data[$i]['longitude']*1;
         }

 		$dataProvider = new ArrayDataProvider([
 				'allModels'=>$data,
                    
 				// 'sort'=>['attributes'=>['yy','mm','cnt','sumadj','cmi','los','los_per_case']],
 			]);
                
        return $this->render('view', [
            'dataProvider'=>$dataProvider,
             'name'=>$name,'pdx1'=>$pdx1,'cid'=>$cid,
            'latitude'=>$latitude,'longitude'=>$longitude,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PctRisk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PctRisk();

        if ($model->load(Yii::$app->request->post())) {
            $this->Uploads(false);
            
            $model->createdate = date('Y-m-d h:m:s');
            $model->username = Yii::$app->user->identity->username;
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
            if($model->save()){
            
            return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
        }        
            return $this->render('create', [
                'model' => $model,
            ]);
        }   
    /**
     * Updates an existing PctRisk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $moobanlist = ArrayHelper::map($this->getMooban($model->tmbpart_id),'id','name');
        list($initialPreview,$initialPreviewConfig) = $this->getInitialPreview($model->ref);
        
        $care = new PctRiskCare();
        if ($model->load(Yii::$app->request->post())) {
            
            $care->cid = $model->cid;
            $care->vn = $model->vn;
            $care->hn = $model->hn;
            $care->name = $model->name;
            $care->givesend = $model->givesend;
            $care->risk_id = $model->id;
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
            
            $care->save();
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'moobanlist'=>$moobanlist,
                'initialPreview'=>$initialPreview,
                'initialPreviewConfig'=>$initialPreviewConfig
            ]);
        }
    }
    
    public function actionRpstupdate($id)
    {
        $model = $this->findModel($id);
        $moobanlist = ArrayHelper::map($this->getMooban($model->tmbpart_id),'id','name');
        list($initialPreview,$initialPreviewConfig) = $this->getInitialPreview($model->ref);

        if ($model->load(Yii::$app->request->post())) {
            $this->Uploads(false);
            
             if($model->save()){
            return $this->redirect(['/pctclinic/pct-risk-care/index']);
             }
        }       
            return $this->renderAjax('rpstupdate', [
                'model' => $model,
                'moobanlist'=>$moobanlist,
                'initialPreview'=>$initialPreview,
                'initialPreviewConfig'=>$initialPreviewConfig
            ]);
        }   
    
    public function actionUpdateview($id)
    {
        $model = $this->findModel($id);
        $moobanlist = ArrayHelper::map($this->getMooban($model->tmbpart_id),'id','name');
        list($initialPreview,$initialPreviewConfig) = $this->getInitialPreview($model->ref);

        if ($model->load(Yii::$app->request->post())) {
            $this->Uploads(false);
            
             if($model->save()){
            return $this->redirect(['/pctclinic/pct-risk/indexview']);
             }
        }       
            return $this->render('_indexview', [
                'model' => $model,
                'moobanlist'=>$moobanlist,
                'initialPreview'=>$initialPreview,
                'initialPreviewConfig'=>$initialPreviewConfig
            ]);
        }   

    /**
     * Deletes an existing PctRisk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        //remove upload file & data
        $this->removeUploadDir($model->ref);
        Uploads::deleteAll(['ref'=>$model->ref]);

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PctRisk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PctRisk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PctRisk::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGetMooban() {
     $out = [];
     if (isset($_POST['depdrop_parents'])) {
         $parents = $_POST['depdrop_parents'];
         if ($parents != null) {
             $tmbpart_id = $parents[0];
             $out = $this->getMooban($tmbpart_id);
             echo Json::encode(['output'=>$out, 'selected'=>'']);
             return;
         }
     }
     echo Json::encode(['output'=>'', 'selected'=>'']);
 }
 protected function getMooban($id){
     $datas = \app\modules\pctclinic\models\Pctmooban::find()->where(['tmbpart'=>$id])->all();
     return $this->MapData($datas,'mooban','mooban');
 }
 protected function MapData($datas,$fieldId,$fieldName){
     $obj = [];
     foreach ($datas as $key => $value) {
         array_push($obj, ['id'=>$value->{$fieldId},'name'=>$value->{$fieldName}]);
     }
     return $obj;
 }
 
 /*|*********************************************************************************|
  |================================ Upload Ajax ====================================|
  |*********************************************************************************|*/

    public function actionUploadAjax(){
           $this->Uploads(true);
     }

    private function CreateDir($folderName){
        if($folderName != NULL){
            $basePath = PctRisk::getUploadPath();
            if(BaseFileHelper::createDirectory($basePath.$folderName,0777)){
                BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail',0777);
            }
        }
        return;
    }

    private function removeUploadDir($dir){
        BaseFileHelper::removeDirectory(PctRisk::getUploadPath().$dir);
    }

    private function Uploads($isAjax=false) {
             if (Yii::$app->request->isPost) {
                $images = UploadedFile::getInstancesByName('upload_ajax');
                if ($images) {

                    if($isAjax===true){
                        $ref =Yii::$app->request->post('ref');
                    }else{
                        $PctRisk = Yii::$app->request->post('PctRisk');
                        $ref = $PctRisk['ref'];
                    }

                    $this->CreateDir($ref);

                    foreach ($images as $file){
                        $fileName       = $file->baseName . '.' . $file->extension;
                        $realFileName   = md5($file->baseName.time()) . '.' . $file->extension;
                        $savePath       = PctRisk::UPLOAD_FOLDER.'/'.$ref.'/'. $realFileName;
                        if($file->saveAs($savePath)){

                            if($this->isImage(Url::base(true).'/'.$savePath)){
                                 $this->createThumbnail($ref,$realFileName);
                            }

                            $model                  = new Uploadpctrisk;
                            $model->ref             = $ref;
                            $model->file_name       = $fileName;
                            $model->real_filename   = $realFileName;
                            $model->save();

                            if($isAjax===true){
                                echo json_encode(['success' => 'true']);
                            }

                        }else{
                            if($isAjax===true){
                                echo json_encode(['success'=>'false','eror'=>$file->error]);
                            }
                        }

                    }
                }
            }
    }

    private function getInitialPreview($ref) {
            $datas = Uploadpctrisk::find()->where(['ref'=>$ref])->all();
            $initialPreview = [];
            $initialPreviewConfig = [];
            foreach ($datas as $key => $value) {
                array_push($initialPreview, $this->getTemplatePreview($value));
                array_push($initialPreviewConfig, [
                    'caption'=> $value->file_name,
                    'width'  => '120px',
                    'url'    => Url::to(['/pctclinic/pct-risk/deletefile-ajax']),
                    'key'    => $value->upload_id
                ]);
            }
            return  [$initialPreview,$initialPreviewConfig];
    }

    public function isImage($filePath){
            return @is_array(getimagesize($filePath)) ? true : false;
    }

    private function getTemplatePreview(Uploadpctrisk $model){
            $filePath = PctRisk::getUploadUrl().$model->ref.'/thumbnail/'.$model->real_filename;
            $isImage  = $this->isImage($filePath);
            if($isImage){
                $file = Html::img($filePath,['class'=>'file-preview-image', 'alt'=>$model->file_name, 'title'=>$model->file_name]);
            }else{
                $file =  "<div class='file-preview-other'> " .
                         "<h2><i class='glyphicon glyphicon-file'></i></h2>" .
                         "</div>";
            }
            return $file;
    }

    private function createThumbnail($folderName,$fileName,$width=250){
      $uploadPath   = PctRisk::getUploadPath().'/'.$folderName.'/';
      $file         = $uploadPath.$fileName;
      $image        = Yii::$app->image->load($file);
      $image->resize($width);
      $image->save($uploadPath.'thumbnail/'.$fileName);
      return;
    }

    public function actionDeletefileAjax(){

        $model = Uploadpctrisk::findOne(Yii::$app->request->post('key'));
        if($model!==NULL){
            $filename  = PctRisk::getUploadPath().$model->ref.'/'.$model->real_filename;
            $thumbnail = PctRisk::getUploadPath().$model->ref.'/thumbnail/'.$model->real_filename;
            if($model->delete()){
                @unlink($filename);
                @unlink($thumbnail);
                echo json_encode(['success'=>true]);
            }else{
                echo json_encode(['success'=>false]);
            }
        }else{
          echo json_encode(['success'=>false]);  
        }
    }
    
    public function actionIndivcare($hn = null){
        
        $sql = "SELECT  prc.*,ppr.`name` as perrpst,ppr.tel FROM pct_risk pr
                LEFT JOIN pct_risk_care prc on prc.hn=pr.hn
                LEFT JOIN pct_per_rpst ppr on ppr.id=prc.giver
                WHERE prc.hn ='$hn' and pr.confirmin='1'
                GROUP BY prc.id    
                ORDER BY prc.datecare DESC,pr.hn";        
       
           $rawData = \Yii::$app->db->createCommand($sql)->queryAll(); 
        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        return $this->renderAjax('indivcare', [
                    'rawData' => $rawData,
                    'sql' => $sql,
                    'hn' => $hn,                  
                    
        ]);
    }
}
