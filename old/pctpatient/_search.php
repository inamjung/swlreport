<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PctpatientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pctpatient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pname') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'sex') ?>

    <?= $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'cid') ?>

    <?php // echo $form->field($model, 'addrpart') ?>

    <?php // echo $form->field($model, 'moopart') ?>

    <?php // echo $form->field($model, 'tmbpart') ?>

    <?php // echo $form->field($model, 'amppart') ?>

    <?php // echo $form->field($model, 'chwpart') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'hospcode') ?>

    <?php // echo $form->field($model, 'hn') ?>

    <?php // echo $form->field($model, 'main_pdx') ?>

    <?php // echo $form->field($model, 'pdx1') ?>

    <?php // echo $form->field($model, 'pdx2') ?>

    <?php // echo $form->field($model, 'gis') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'avatar1') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'updatedate') ?>

    <?php // echo $form->field($model, 'docs') ?>

    <?php // echo $form->field($model, 'covenant') ?>

    <?php // echo $form->field($model, 'ref') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
