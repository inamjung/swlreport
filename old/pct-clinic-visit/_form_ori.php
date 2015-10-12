<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PctClinicVisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pct-clinic-visit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vstdate')->textInput() ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clinic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icd10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gfr_thai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gfr_ckd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message_gfr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cvd_risk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urine_protein')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hdl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ldl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cholesterol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'triglyceride')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hba1c')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'microalbumin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fbs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bps')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bpd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'smoke')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hosconfirm')->textInput() ?>

    <?= $form->field($model, 'ssoconfirm')->textInput() ?>

    <?= $form->field($model, 'sendto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <?= $form->field($model, 'updatedate')->textInput() ?>

    <?= $form->field($model, 'statustype')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
