<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pctpatientrisk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pctpatientrisk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addrpart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'moo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'moopart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tmbpart_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amppart_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chwpart_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_pdx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pdx1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <?= $form->field($model, 'updatedate')->textInput() ?>

    <?= $form->field($model, 'docs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'covenant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regdate')->textInput() ?>

    <?= $form->field($model, 'pstatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ptype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'confirmin')->textInput() ?>

    <?= $form->field($model, 'cvd_risk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sendrpst')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rpstok')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
