<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PctDrugClinicVisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pct Drug Clinic Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-drug-clinic-visit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pct Drug Clinic Visit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'vn',
            'hn',
            'icode',
            'vstdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
