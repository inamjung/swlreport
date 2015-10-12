<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PctdrugSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'ข้อมูลยา';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctdrug-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มยา', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'drug',
            'didcode',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
