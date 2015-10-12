<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PctClinicVisit */

$this->title = $model->vn;
$this->params['breadcrumbs'][] = ['label' => 'Pct Clinic Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-clinic-visit-view">

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
            'age',
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
            'bmi',
            'lat',
            'lng',
            'age',
            'bmi',
            'hosconfirm',
            'ssoconfirm',
            'sendto',
            'createdate',
            'updatedate',
           
        ],
    ]) ?>

</div>
