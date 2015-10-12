<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctClinicVisitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pct-clinic-visit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vn') ?>

    <?= $form->field($model, 'vstdate') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'clinic') ?>

    <?= $form->field($model, 'icd10') ?>

    <?php // echo $form->field($model, 'cr') ?>

    <?php // echo $form->field($model, 'gfr_thai') ?>

    <?php // echo $form->field($model, 'gfr_ckd') ?>

    <?php // echo $form->field($model, 'stage') ?>

    <?php // echo $form->field($model, 'message_gfr') ?>

    <?php // echo $form->field($model, 'cvd_risk') ?>

    <?php // echo $form->field($model, 'urine_protein') ?>

    <?php // echo $form->field($model, 'hdl') ?>

    <?php // echo $form->field($model, 'ldl') ?>

    <?php // echo $form->field($model, 'cholesterol') ?>

    <?php // echo $form->field($model, 'triglyceride') ?>

    <?php // echo $form->field($model, 'hba1c') ?>

    <?php // echo $form->field($model, 'microalbumin') ?>

    <?php // echo $form->field($model, 'fbs') ?>

    <?php // echo $form->field($model, 'bps') ?>

    <?php // echo $form->field($model, 'bpd') ?>

    <?php // echo $form->field($model, 'smoke') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'hosconfirm') ?>

    <?php // echo $form->field($model, 'ssoconfirm') ?>

    <?php // echo $form->field($model, 'sendto') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'updatedate') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'bmi') ?>

    <?php // echo $form->field($model, 'next_app_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
