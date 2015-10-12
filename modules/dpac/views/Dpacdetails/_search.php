<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\dpac\models\DpacdetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dpacdetails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'waist') ?>

    <?= $form->field($model, 'weight') ?>

    <?= $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'sugar') ?>

    <?php // echo $form->field($model, 'disease') ?>

    <?php // echo $form->field($model, 'blood') ?>

    <?php // echo $form->field($model, 'bmi') ?>

    <?php // echo $form->field($model, 'ldl') ?>

    <?php // echo $form->field($model, 'cho') ?>

    <?php // echo $form->field($model, 'tg') ?>

    <?php // echo $form->field($model, 'cr') ?>

    <?php // echo $form->field($model, 'ckd') ?>

    <?php // echo $form->field($model, 'kidney') ?>

    <?php // echo $form->field($model, 'akram') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'cid') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'gfr_thai') ?>

    <?php // echo $form->field($model, 'gfr_ckd') ?>

    <?php // echo $form->field($model, 'stage') ?>

    <?php // echo $form->field($model, 'cvd_risk') ?>

    <?php // echo $form->field($model, 'hdl') ?>

    <?php // echo $form->field($model, 'tc') ?>

    <?php // echo $form->field($model, 'microalbumin') ?>

    <?php // echo $form->field($model, 'fbs') ?>

    <?php // echo $form->field($model, 'bps') ?>

    <?php // echo $form->field($model, 'bpd') ?>

    <?php // echo $form->field($model, 'smoke') ?>

    <?php // echo $form->field($model, 'confirm') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'bp') ?>

    <?php // echo $form->field($model, 'shoulder') ?>

    <?php // echo $form->field($model, 'armleft') ?>

    <?php // echo $form->field($model, 'armright') ?>

    <?php // echo $form->field($model, 'legleft') ?>

    <?php // echo $form->field($model, 'legright') ?>

    <?php // echo $form->field($model, 'calfleft') ?>

    <?php // echo $form->field($model, 'calfright') ?>

    <?php // echo $form->field($model, 'chest') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
