<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PctDrugClinicVisitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pct-drug-clinic-visit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'vn') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'icode') ?>

    <?= $form->field($model, 'vstdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
