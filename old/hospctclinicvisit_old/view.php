<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hospctclinicvisit */

$this->title = $model->vn;
$this->params['breadcrumbs'][] = ['label' => 'Hospctclinicvisits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospctclinicvisit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vn], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vn], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'attributes' => [
            'vn',
            'vstdate',
            'hn',
            'clinic',
            'icd10',
            'cr',
            'gfr_thai',
            'gfr_ckd',
            'stage',
            'message_gfr',
            'cvd_risk',
            'urine_protein',
            'hdl',
            'ldl',
            'cholesterol',
            'triglyceride',
            'hba1c',
            'microalbumin',
            'fbs',
            'bps',
            'bpd',
            'smoke',
            'lat',
            'lng',
            'hosconfirm',
            'ssoconfirm',
            'sendto',
        ],
    ]) ?>

</div>
