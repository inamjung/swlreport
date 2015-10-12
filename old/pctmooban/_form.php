<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pctmooban */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pctmooban-form">
    <div class="panel panel-primary">
    <div class="panel-heading"><h4><i class="glyphicon glyphicon-home"></i> ข้อมูลหมู่บ้าน</h4></div>
  <div class="panel-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mooban')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'tmbpart')->radioList(\app\models\Pctmooban::itemAlias('tmbpart')) ?><hr>

    
    <?= $form->field($model, 'hospcode')->radioList(\app\models\Pctmooban::itemAlias('hospcode')) ?>  
   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>