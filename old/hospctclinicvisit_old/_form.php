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

<div class="hospctclinicvisit-form">
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
            <?= $form->field($model, 'vstdate')->textInput(['readonly'=>true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'hn')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-4">
            <?= $form->field($model, 'patientName')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">            
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
        </div>
    </div>
    <div class="row">        
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'icd10')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'fbs')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'hba1c')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'bp')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'smoke')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>         
</div>
</div>    
</div>            

<div class="panel panel-danger">
        <div class="panel-heading"></div>
        <div class="panel-body">            
    <div class="row">        
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'stage')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'message_gfr')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'cvd_risk')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>        
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'cr')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'gfr_thai')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'gfr_ckd')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
    </div>    
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'hdl')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'ldl')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'cholesterol')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'triglyceride')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
           <?= $form->field($model, 'urine_protein')->textInput(['readonly'=>true,'maxlength' => true]) ?> 
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'microalbumin')->textInput(['readonly'=>true,'maxlength' => true]) ?>
        </div>        
</div>
</div>    
</div>           
<hr>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">            
            <?= $form->field($model, 'sendto')->label('ส่งเคส')->radioList(\app\models\Hospctclinicvisit::itemAlias('sendto')) ?>
        </div> 
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
