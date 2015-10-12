<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PctpatientriskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pctpatientrisks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctpatientrisk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pctpatientrisk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hn',
            'pname',
            'name',
            'sex',
            // 'age',
            // 'birthday',
            // 'cid',
            // 'addrpart',
            // 'moo',
            // 'moopart',
            // 'tmbpart_id',
            // 'amppart_id',
            // 'chwpart_id',
            // 'tel',
            // 'hospcode',
            // 'main_pdx',
            // 'pdx1',
            // 'gis',
            // 'latitude',
            // 'longitude',
            // 'avatar1',
            // 'createdate',
            // 'updatedate',
            // 'docs',
            // 'covenant',
            // 'ref',
            // 'status',
            // 'username',
            // 'drug',
            // 'regdate',
            // 'pstatus',
            // 'ptype',
            // 'confirmin',
            // 'cvd_risk',
            // 'stage',
            // 'sendrpst',
            // 'rpstok',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
