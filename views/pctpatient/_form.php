<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\PctHospcode;
use kartik\widgets\FileInput;
//use yii\widgets\Pjax;
use yii\helpers\Url;
use kartik\widgets\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\models\Pctpatient */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="pctpatient-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="panel panel-primary">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-log-in"></i> บันทึกข้อมูลผู้ป่วย Stoke & Mi</h4></div>
    <div class="panel-body">
    <div class="row">
        <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 50])->label(false); ?>
        <div class="col-sm-offset-3 col-sm-3">            
            <?=
            $form->field($model, 'pname')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(app\models\PctPname::find()->all(), 'namep', 'namep'),
                        'options' => [
                        'placeholder' => '<--คำนำหน้า-->'],                        
                        'pluginOptions' =>
                        [
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-5">
             <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>        
           
</div>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-3"> 
             <?= $form->field($model, 'sex')->label('เพศ')->inline()->radioList(\app\models\PctPatient::itemAlias('sex')) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2"> 
                <?=$form->field($model,'birthday')->widget(\yii\jui\DatePicker::className(),[  
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,
                        'z-index'=>1
                     ],
                     
                     'options'=>['class'=>'form-control'
                     ],
                ]);
            ?>
        </div> 
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'cid')->label('เลขบัตร ปชช.')->widget(\yii\widgets\MaskedInput::classname(), [
             'mask' => '9-9999-99999-99-9',
                ]) ?> 
        </div>
          
    </div>
    <div class="row">
         <div class="col-sm-offset-1 col-sm-1"> 
            <?= $form->field($model, 'addrpart')->label('บ้านเลขที่')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-1"> 
            <?= $form->field($model, 'moo')->label('หมู่')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">            
            <?=
            $form->field($model, 'tmbpart_id')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(app\models\Pctaddress::find()->all(), 'tmbpart', 'name'),
                        'options' => [
                        'placeholder' => '<--ตำบล-->'],                        
                        'pluginOptions' =>
                        [
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div> 
        <div class="col-xs-3 col-sm-3 col-md-3"> 
            <?=
            $form->field($model, 'moopart')->widget(DepDrop::className(), [
                    'data' => $moobanlist,
                    'options' => ['placeholder' => '<--หมู่บ้าน-->'],
                    'type' => DepDrop::TYPE_SELECT2,
                    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                    'pluginOptions' => [
                        'depends' => ['pctpatient-tmbpart_id'],            
                        'url' => yii\helpers\Url::to(['/pctpatient/get-mooban']),
                        'loadingText' => 'กำลังค้นหา...',
                    ],
                ]);
            ?>
        </div>  
        <div class="col-xs-3 col-sm-3 col-md-3">            
            <?= $form->field($model, 'tel')->widget(\yii\widgets\MaskedInput::classname(), [
             'mask' => '99-9999-9999',
                ]) ?>  
        </div>
      </div>
        <hr>
    <div class="row">
</div>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-2"> 
            <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-4">            
            <?=
            $form->field($model, 'main_pdx')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(app\models\PctDisease::find()->all(), 'code',
                        function($model,$defaultValue){
                                return $model->code.'-'.$model->name;
                        }),                               
                        'options' => [                            
                        'placeholder' => '<--รหัสโรค-->'],                        
                        'pluginOptions' =>
                        [
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-4"> 
            <?=
            $form->field($model, 'drug')->label('ยาที่ใช้')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(app\models\Pctdrug::find()->all(), 'drug', 'drug'),
                        'options' => [
                        'placeholder' => '<--ยาที่ใช้-->'],                        
                        'pluginOptions' =>
                        [
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div>
    </div>
            <div class="row"> 
            <div class="col-sm-offset-1 col-sm-2">           
            <?=
            $form->field($model, 'hospcode')->label('หน่วยบริการ')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(app\models\PctHospcode::find()->all(), 'hospcode', 'name'),
                        'options' => [
                        'placeholder' => '<--รพ.สต-->'],                        
                        'pluginOptions' =>
                        [
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-4">
             <?= $form->field($model, 'ptype')->label('โรคประจำตัว')->inline()->radioList(\app\models\PctPatient::itemAlias('ptype')) ?>
        </div>        
        <div class="col-xs-3 col-sm-3 col-md-5">
             <?= $form->field($model, 'status')->label('สถานะ')->inline()->radioList(\app\models\PctPatient::itemAlias('status')) ?>
        </div>  
            </div>  <hr>  
            
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
         <?= $form->field($model, 'pstatus')->label('สถานะการรักษา')->inline()->radioList(\app\models\PctPatient::itemAlias('pstatus')) ?>   
        </div>         
    </div> 
            
        <div class="col-sm-offset-1 col-sm-10">
         <div class="form-group field-upload_files">
                <label class="control-label" for="upload_files[]"><i class="glyphicon glyphicon-camera"></i> ภาพถ่ายเกี่ยวกับผู้ป่วย (อับโหลดได้ไม่เกิน3ภาพ) </label>
            <div>
              <?= FileInput::widget([
                   'name' => 'upload_ajax[]',
                   'options' => ['multiple' => true,'accept' => 'image/*'], //'accept' => 'image/*' หากต้องเฉพาะ image
                    'pluginOptions' => [
                        'overwriteInitial'=>false,
                        'initialPreviewShowDelete'=>true,
                        'initialPreview'=> $initialPreview,
                        'initialPreviewConfig'=> $initialPreviewConfig,
                        'uploadUrl' => Url::to(['/pctpatient/upload-ajax']),
                        'uploadExtraData' => [
                            'ref' => $model->ref,
                        ],
                        'maxFileCount' => 100
                    ]
                ]);
    ?>  
        </div>
    </div>

</div>
</div> 
</div>        
    
</div>

    
    <div class="form-group">
            <div class="col-sm-offset-2 col-sm-9">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', 
            ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
