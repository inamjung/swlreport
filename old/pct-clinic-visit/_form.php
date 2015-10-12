<?php



use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model app\models\Hospctclinicvisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pct-clinic-visit-form">
    <?php //echo $model->patientcid; ?>

    <?php $form = ActiveForm::begin(); ?>
<!--    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'vn')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="col-xs-4 col-sm-4 col-md-4">
            
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            
        </div> 
</div>-->
    <div class="panel panel-danger">
        <div class="panel-heading"></div>
        <div class="panel-body">
    <div class="row">        
<!--        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'vn')->textInput() ?>
        </div>-->

        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'vstdate')->label('วันที่รับบริการ')->textInput(['readonly'=>true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'hn')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
<!--        <div class="col-xs-3 col-sm-3 col-md-4">
            <?= $form->field($model, 'patientName')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>-->        
<!--        <div class="col-xs-3 col-sm-3 col-md-3">            
            <?=
            $form->field($model, 'clinic')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(app\models\Hosclinic::find()->orderBy('clinic')->all(), 'clinic', 'name'),
                        'options' => [
                        'placeholder' => 'คลินิก'],                        
                        'pluginOptions' =>
                        [
                            'disabled' => true,
                            'allowClear' => true
                        ],
                    ]);
            ?> 
        </div>-->
               
        <div class="col-xs-3 col-sm-3 col-md-1">
            <?= $form->field($model, 'icd10')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'smoke')->label('บุหรี่')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
         <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'bp')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-1">
            <?= $form->field($model, 'bmi')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
       
        <div class="col-xs-3 col-sm-3 col-md-1">
            <?= $form->field($model, 'fbs')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-1">
            <?= $form->field($model, 'hba1c')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
    </div>
               
</div>
</div>    
          

<div class="panel panel-danger">
        <div class="panel-heading"></div>
        <div class="panel-body">            
    <div class="row">   
        <div class="col-xs-3 col-sm-3 col-md-1">
            <?= $form->field($model, 'cvd_risk')->label('CvdRisk')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'stage')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>  
        <div class="col-xs-3 col-sm-3 col-md-1">
            <?= $form->field($model, 'cr')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-1">
            <?= $form->field($model, 'cholesterol')->label('TC')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-1">
            <?= $form->field($model, 'gfr_ckd')->label('Gfr_EPI')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-1">
            <?= $form->field($model, 'gfr_thai')->label('Gfr_Th')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-1">
            <?= $form->field($model, 'hdl')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-1">
            <?= $form->field($model, 'ldl')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-1">
            <?= $form->field($model, 'triglyceride')->label('TG')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        
        <div class="col-xs-3 col-sm-1 col-md-1">
           <?= $form->field($model, 'urine_protein')->label('U_Pro')->textInput(['readonly'=>true,'maxlength' => true]) ?> 
        </div>
        <div class="col-xs-3 col-sm-1 col-md-1">
            <?= $form->field($model, 'microalbumin')->label('U_Albu')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>        
</div>
</div>    
</div>           
<hr>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">            
            <?= $form->field($model, 'sendto')->label('<i class="glyphicon glyphicon-pushpin"></i> ผลการประเมิน')->radioList(\app\models\pctclinicvisit::itemAlias('sendto')) ?>
        </div> 
        <div class="col-xs-3 col-sm-3 col-md-3">            
            <?= $form->field($model, 'ssoconfirm')->label('<i class="glyphicon glyphicon-ok-sign"></i>ยืนยันรับเคส')->radioList(\app\models\pctclinicvisit::itemAlias('ssoconfirm')) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-ok"></i> บันทึก' : '<i class="glyphicon glyphicon-ok"></i> บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
