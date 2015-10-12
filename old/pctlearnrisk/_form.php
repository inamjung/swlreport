<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pctlearnrisk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pctlearnrisk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_pdx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'risk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'learning')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'learning_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createDate')->textInput() ?>

    <?= $form->field($model, 'updateDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
