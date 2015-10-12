<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PctstokemiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctstokemi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> บันทึกรายการ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
   
    $gridColumns = [
    ['class'=>'kartik\grid\SerialColumn'],

            //'id',
            'cid',
            'hn',
            'pname',
            'name',
            'age_y',
            // 'drug',
            // 'druguse',
            // 'sex',
            // 'addrpart',
            // 'moopart',
            // 'tmbpart',
             'pdx',
            // 'admitdate',
            // 'referdate',
            // 'hospname_refer',
            // 'dchdate',
            // 'typedch',
            // 'result_black:ntext',
            // 'sendteam',
            // 'username',
            // 'appointdate',
            // 'sign:ntext',
             'status',
            // 'note1',
            // 'note2',
            // 'note3',
            // 'createdate',
            // 'updatedate',

            [
        'class'=>'kartik\grid\ActionColumn',
        'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">{view}</div>',
                'buttons'=>[
                    'view'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-search"></i> ข้อมูล',$url,['class'=>'btn btn-info']);
                    }, 
           ]                 
    ],
];
echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,        
        //'showPageSummary' => true,
        'beforeHeader'=>[''],
        'panel' => [           
            'type' => GridView::TYPE_INFO,
            'heading' => 'รายการความเคลื่อนไหวผู้ป่วย Stoke & Mi',
        ],
    ]);
    ?>
</div
