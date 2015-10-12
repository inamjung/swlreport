<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\dpac\models\Dpacdetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dpacdetails-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="panel panel-default">
  <div class="panel-heading">ข้อมูลผู้มารับบริการ</div>
  <div class="panel-body">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
        <?= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?></div>
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
        
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Panel heading without title</div>
  <div class="panel-body">
    <div class="row">
        
    </div>
  </div>
</div>

    <div class="row">
    
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'waist')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'weight')->textInput() ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'height')->textInput() ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'sugar')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'disease')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'bloodgrp')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'bmi')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'ldl')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'cho')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'tg')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'cr')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'ckd')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'kidney')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'akram')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'date')->textInput() ?>
        </div>
    
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'gfr_thai')->textInput() ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'gfr_ckd')->textInput() ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'stage')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'cvd_risk')->textInput() ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'hdl')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'tc')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'microalbumin')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'fbs')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'bps')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'bpd')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'smoke')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-xs-12 col-sm-4 col-md-3">
        <?= $form->field($model, 'confirm')->textInput() ?>
        </div>

   
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'bp')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'shoulder')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'armleft')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'armright')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'legleft')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'legright')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'calfleft')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'calfright')->textInput(['maxlength' => true]) ?></div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <?= $form->field($model, 'chest')->textInput(['maxlength' => true]) ?>
    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
