<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PctlearnriskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pctlearnrisk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'cid') ?>

    <?= $form->field($model, 'main_pdx') ?>

    <?= $form->field($model, 'risk') ?>

    <?php // echo $form->field($model, 'learning') ?>

    <?php // echo $form->field($model, 'learning_by') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'createDate') ?>

    <?php // echo $form->field($model, 'updateDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
