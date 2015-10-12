<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PctlearnriskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pctlearnrisks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctlearnrisk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pctlearnrisk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hn',
            'cid',
            'main_pdx',
            'risk',
            // 'learning',
            // 'learning_by',
            // 'username',
            // 'createDate',
            // 'updateDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
