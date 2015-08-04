<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pctdrug */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pctdrug-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="panel panel-primary">
    <div class="panel-heading"><h4><i class="glyphicon glyphicon-pencil"></i> เพิ่มข้อมูลยา</h4></div>
  <div class="panel-body">
    <?= $form->field($model, 'didcode')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'drug')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
      </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
