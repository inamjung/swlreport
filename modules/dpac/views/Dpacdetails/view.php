<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\dpac\models\Dpacdetails */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dpacdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpacdetails-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hn',
            'waist',
            'weight',
            'height',
            'sugar',
            'disease',
            'bloodgrp',
            'bmi',
            'ldl',
            'cho',
            'tg',
            'cr',
            'ckd',
            'kidney',
            'akram',
            'date',
            'cid',
            'age',
            'gfr_thai',
            'gfr_ckd',
            'stage',
            'cvd_risk',
            'hdl',
            'tc',
            'microalbumin',
            'fbs',
            'bps',
            'bpd',
            'smoke',
            'confirm',
            'name',
            'bp',
            'shoulder',
            'armleft',
            'armright',
            'legleft',
            'legright',
            'calfleft',
            'calfright',
            'chest',
        ],
    ]) ?>

</div>
