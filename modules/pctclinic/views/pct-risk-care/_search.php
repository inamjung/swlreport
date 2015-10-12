<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctRiskCareSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pct-risk-care-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cid') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'givesend') ?>

    <?php // echo $form->field($model, 'givercare') ?>

    <?php // echo $form->field($model, 'giver') ?>

    <?php // echo $form->field($model, 'rpstok') ?>

    <?php // echo $form->field($model, 'givertel') ?>

    <?php // echo $form->field($model, 'giver1') ?>

    <?php // echo $form->field($model, 'datecare') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'updatedate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
