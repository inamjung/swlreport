<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\dpac\models\PctAllVisit */

$this->title = $model->vn;
$this->params['breadcrumbs'][] = ['label' => 'Pct All Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-all-visit-view">

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
            'createdate',
            'updatedate',
            'age',
            'bmi',
            'next_app_date',
        ],
    ]) ?>

</div>
