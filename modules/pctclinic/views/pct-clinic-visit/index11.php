<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\pctclinic\models\PctClinicVisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pct Clinic Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-clinic-visit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pct Clinic Visit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vn',
            'vstdate',
            'hn',
            'clinic',
            'icd10',
            // 'cr',
            // 'gfr_thai',
            // 'gfr_ckd',
            // 'stage',
            // 'message_gfr',
            // 'cvd_risk',
            // 'urine_protein',
            // 'hdl',
            // 'ldl',
            // 'cholesterol',
            // 'triglyceride',
            // 'hba1c',
            // 'microalbumin',
            // 'fbs',
            // 'bps',
            // 'bpd',
            // 'smoke',
            // 'lat',
            // 'lng',
            // 'hosconfirm',
            // 'ssoconfirm',
            // 'sendto',
            // 'createdate',
            // 'updatedate',
            // 'age',
            // 'bmi',
            // 'next_app_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
