<?php

namespace app\controllers;

use Yii;
use app\models\Pctpatient;
use app\models\PctpatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Pctaddress;
use app\models\Pcthospcode;
use app\models\Pctpname;
use app\models\Uploads;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\web\UploadedFile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;

/**
 * PctpatientController implements the CRUD actions for Pctpatient model.
 */
class PctpatientController extends Controller
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
            
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=> ['index','create','view','update','delete'],
                'ruleConfig'=>[
                    'class'=>AccessRule::className()
                ],
                'rules'=>[
                    [
                        'actions'=>['index','create','view','update','delete'],
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

    /**
     * Lists all Pctpatient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PctpatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
            
        ]);
    }

    /**
     * Displays a single Pctpatient model.
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
     * Creates a new Pctpatient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pctpatient();

        if ($model->load(Yii::$app->request->post())) {
            
            $this->Uploads(false);           
            $model->username = Yii::$app->user->identity->username;
            
        if($model->save()){
                Yii::$app->session->setFlash('success', 'บันทึกข้อูลสำเร็จ!');
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
        }
            return $this->render('create', [
                'model' => $model,
            ]);
        }  

    /**
     * Updates an existing Pctpatient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        list($initialPreview,$initialPreviewConfig) = $this->getInitialPreview($model->ref);
        $moobanlist = ArrayHelper::map($this->getMooban($model->tmbpart_id),'id','name');

        if ($model->load(Yii::$app->request->post())) {
            $this->Uploads(false);
            
            if($model->save()){    
            return $this->redirect(['view', 'id' => $model->id]);
            }
        }
            return $this->render('update', [
                'model' => $model,
                'moobanlist'=>$moobanlist,
                'initialPreview'=>$initialPreview,
                'initialPreviewConfig'=>$initialPreviewConfig
      
            ]);
        }
   

    /**
     * Deletes an existing Pctpatient model.
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
     * Finds the Pctpatient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pctpatient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pctpatient::findOne($id)) !== null) {
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
     $datas = \app\models\Pctmooban::find()->where(['tmbpart'=>$id])->all();
     return $this->MapData($datas,'mooban','mooban');
 }
 protected function MapData($datas,$fieldId,$fieldName){
     $obj = [];
     foreach ($datas as $key => $value) {
         array_push($obj, ['id'=>$value->{$fieldId},'name'=>$value->{$fieldName}]);
     }
     return $obj;
 }
 
 //    +++++++อับโหลดรูป++++++++++
   
   public function actionUploadAjax(){
           $this->Uploads(true);
     }

    private function CreateDir($folderName){
        if($folderName != NULL){
            $basePath = Pctpatient::getUploadPath();
            if(BaseFileHelper::createDirectory($basePath.$folderName,0777)){
                BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail',0777);
            }
        }
        return;
    }

    private function removeUploadDir($dir){
        BaseFileHelper::removeDirectory(Pctpatient::getUploadPath().$dir);
    }

    private function Uploads($isAjax=false) {
             if (Yii::$app->request->isPost) {
                $images = UploadedFile::getInstancesByName('upload_ajax');
                if ($images) {

                    if($isAjax===true){
                        $ref =Yii::$app->request->post('ref');
                    }else{
                        $Pctpatient = Yii::$app->request->post('Pctpatient');
                        $ref = $Pctpatient['ref'];
                    }
                   
                    $this->CreateDir($ref);

                    foreach ($images as $file){
                        $fileName       = $file->baseName . '.' . $file->extension;
                        $realFileName   = md5($file->baseName.time()) . '.' . $file->extension;
                        $savePath       = Pctpatient::UPLOAD_FOLDER.'/'.$ref.'/'. $realFileName;
                        if($file->saveAs($savePath)){

                            if($this->isImage(Url::base(true).'/'.$savePath)){
                                 $this->createThumbnail($ref,$realFileName);
                            }
                          
                            $model                  = new Uploads;
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
            $datas = Uploads::find()->where(['ref'=>$ref])->all();
            $initialPreview = [];
            $initialPreviewConfig = [];
            foreach ($datas as $key => $value) {
                array_push($initialPreview, $this->getTemplatePreview($value));
                array_push($initialPreviewConfig, [
                    'caption'=> $value->file_name,
                    'width'  => '120px',
                    'url'    => Url::to(['/pctpatient/deletefile-ajax']),
                    'key'    => $value->upload_id
                ]);
            }
            return  [$initialPreview,$initialPreviewConfig];
    }

    public function isImage($filePath){
            return @is_array(getimagesize($filePath)) ? true : false;
    }

    private function getTemplatePreview(Uploads $model){     
            $filePath = Pctpatient::getUploadUrl().$model->ref.'/thumbnail/'.$model->real_filename;
            $isImage  = $this->isImage($filePath);
            if($isImage){
                $file = Html::img($filePath,['class'=>'file-preview-image', 'alt'=>$model->file_name, 'name'=>$model->file_name]);
            }else{
                $file =  "<div class='file-preview-other'> " .
                         "<h2><i class='glyphicon glyphicon-file'></i></h2>" .
                         "</div>";
            }
            return $file;
    }

    private function createThumbnail($folderName,$fileName,$width=250){
      $uploadPath   = Pctpatient::getUploadPath().'/'.$folderName.'/'; 
      $file         = $uploadPath.$fileName;
      $image        = Yii::$app->image->load($file);
      $image->resize($width);
      $image->save($uploadPath.'thumbnail/'.$fileName);
      return;
    }
    
    public function actionDeletefileAjax(){

        $model = Uploads::findOne(Yii::$app->request->post('key'));
        if($model!==NULL){
            $filename  = Pctpatient::getUploadPath().$model->ref.'/'.$model->real_filename;
            $thumbnail = Pctpatient::getUploadPath().$model->ref.'/thumbnail/'.$model->real_filename;
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
  //    !+++++++อับโหลดรูป++++++++++  
    public function actionGetPtName($ptnameID){
        $patients = Pctpatient::findOne($ptnameID);
        echo Json::encode($patients);
    }
}
