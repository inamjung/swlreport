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

    <div class="panel panel-primary">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-2">
                    <?= $form->field($model, 'hn')->textInput(['readonly'=>true,'maxlength' => true]) ?>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <?= $form->field($model, 'patientName')->textInput(['readonly'=>true,'maxlength' => true]) ?>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-1">
                    <?= $form->field($model, 'icd10')->textInput(['readonly'=>true,'maxlength' => true]) ?>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-1">
                    <?= $form->field($model, 'stage')->textInput(['readonly'=>true,'maxlength' => true]) ?>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-1">
                    <?= $form->field($model, 'gfr_ckd')->textInput(['readonly'=>true,'maxlength' => true]) ?>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-1">
                    <?= $form->field($model, 'cvd_risk')->textInput(['readonly'=>true,'maxlength' => true]) ?>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-2">
                    <?= $form->field($model, 'bp')->textInput(['readonly'=>true,'maxlength' => true]) ?>
                </div>
                </div>            
        </div>
    </div>
    
    <div class="panel panel-primary">
        <div class="panel-heading"></div>
        <div class="panel-body">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3"> 
            <?= $form->field($model, 'hosconfirm')->label('รับเคสเข้าระบบ')->radioList(\app\models\Hospctclinicvisit::itemAlias('hosconfirm')) ?>            
        </div>
        
</div>
</div>
</div>        
    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
