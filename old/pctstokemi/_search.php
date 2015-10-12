<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PctstokemiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pctstokemi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cid') ?>

    <?= $form->field($model, 'pname') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'age_y') ?>

    <?php // echo $form->field($model, 'drug') ?>

    <?php // echo $form->field($model, 'druguse') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'addrpart') ?>

    <?php // echo $form->field($model, 'moopart') ?>

    <?php // echo $form->field($model, 'tmbpart') ?>

    <?php // echo $form->field($model, 'pdx') ?>

    <?php // echo $form->field($model, 'admitdate') ?>

    <?php // echo $form->field($model, 'referdate') ?>

    <?php // echo $form->field($model, 'hospname_refer') ?>

    <?php // echo $form->field($model, 'dchdate') ?>

    <?php // echo $form->field($model, 'typedch') ?>

    <?php // echo $form->field($model, 'result_black') ?>

    <?php // echo $form->field($model, 'sendteam') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'appointdate') ?>

    <?php // echo $form->field($model, 'sign') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'note1') ?>

    <?php // echo $form->field($model, 'note2') ?>

    <?php // echo $form->field($model, 'note3') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'updatedate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
