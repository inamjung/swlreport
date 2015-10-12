<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\dpac\models\PctAllVisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pct-all-visit-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="panel panel-default">
  <div class="panel-heading">Panel heading without title</div>
  <div class="panel-body">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2">
        <?= $form->field($model, 'vn')->textInput(['maxlength' => true]) ?></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
        <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?></div>
        <div class="col-xs-12 col-sm-4 col-md-4">
        <?= $form->field($model, 'patientName')->textInput(['maxlength' => true]) ?></div>
        <div class="col-xs-12 col-sm-4 col-md-4">
        <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
        <?= $form->field($model, 'Birthday')->textInput(['maxlength' => true]) ?></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
        <?= $form->field($model, 'age')->textInput() ?></div>
        <div class="col-xs-12 col-sm-4 col-md-8">
        <?= $form->field($model, 'informaddr')->textInput(['maxlength' => true]) ?></div>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Panel heading without title</div>
  <div class="panel-body">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'clinic')->textInput(['maxlength' => true]) ?></div>

<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'icd10')->textInput(['maxlength' => true]) ?></div>

<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'cr')->textInput(['maxlength' => true]) ?></div>

<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'gfr_thai')->textInput(['maxlength' => true]) ?></div>

<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'gfr_ckd')->textInput(['maxlength' => true]) ?></div>

<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'stage')->textInput(['maxlength' => true]) ?></div>

<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'message_gfr')->textInput(['maxlength' => true]) ?></div>

<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'cvd_risk')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'urine_protein')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'hdl')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'ldl')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'cholesterol')->textInput(['maxlength' => true]) ?></div>
 <div class="col-xs-12 col-sm-4 col-md-3">   
 <?= $form->field($model, 'triglyceride')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'hba1c')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'microalbumin')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'fbs')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'bps')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'bpd')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'smoke')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'lng')->textInput(['maxlength' => true]) ?></div>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Panel heading without title</div>
  <div class="panel-body">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'hosconfirm')->textInput() ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'ssoconfirm')->textInput() ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'sendto')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'createdate')->textInput() ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'updatedate')->textInput() ?></div>

<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'bmi')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'next_app_date')->textInput() ?></div>
</div>
    </div>
  </div>
</div>
    
   

    



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
