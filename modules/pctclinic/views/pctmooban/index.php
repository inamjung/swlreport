<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\pctclinic\models\PctmoobanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pctmoobans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctmooban-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pctmooban', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'mooban',
            'tmbpart',
            'hospcode',
            'amppart',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
