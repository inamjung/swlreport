<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\dpac\models\DpacdetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คลินิก DPAC';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpacdetails-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dpacdetails', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('ระบบคัดกรอง', ['pct-all-visit/index'], ['class' => 'btn btn-success']) ?>
    </p>

     <?php echo ExportMenu::widget([
    'dataProvider' => $dataProvider
]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //........
    'panel'=>[
            'before'=>' '
    ],
    //.........
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
            'attribute' => 'hn',
            'label' => 'HN',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
            'options'=> ['style'=>'width:130px;'],
            ],
            [
            'attribute' => 'name',
            'label' => 'ชื่อ-สกุล',
            'headerOptions' => ['class'=>'text-center'],
            ],
            [
            'attribute' => 'cid',
            'label' => 'เลขบัตรประจำตัวประชาชน',
            'headerOptions' => ['class'=>'text-center'],
            ],
            
            [
            'attribute' => 'bloodgrp',
            'label' => 'หมู่เลือด',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
            'options'=> ['style'=>'width:130px;'],
            ],
            //'waistline',
            //'weight',
            //'height',
            // 'sugar',
            // 'disease',
            // 'blood',
            // 'bmi',
            // 'ldl',
            // 'cho',
            // 'tg',
            // 'cr',
            // 'ckd',
            // 'kidney',
            // 'akram',
            // 'date',
            // 'cid',
            // 'age',
            // 'gfr_thai',
            // 'gfr_ckd',
            // 'stage',
            // 'cvd_risk',
            // 'hdl',
            // 'tc',
            // 'microalbumin',
            // 'fbs',
            // 'bps',
            // 'bpd',
            // 'smoke',
            [                
            'class' => 'kartik\grid\BooleanColumn',
            'attribute' => 'smoke',
            'label' => 'บุหรี่',    
            'vAlign' => 'middle',
            ],
            
            [                
            'class' => 'kartik\grid\BooleanColumn',
            'attribute' => 'confirm',
            'label' => 'เข้าคลินิก DPAC',    
            'vAlign' => 'middle',
            ],
            // 'name',
            // 'bp',
            // 'shoulder',
            // 'armleft',
            // 'armright',
            // 'legleft',
            // 'legright',
            // 'calfleft',
            // 'calfright',
            // 'chest',

            //['class' => 'yii\grid\ActionColumn'],
            [
            'class' => 'yii\grid\ActionColumn',

            'options'=>['style'=>'width:130px;'],
            'contentOptions' => ['class'=>'text-center'],
            'buttonOptions'=>['class'=>'btn btn-default'],
            'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
         ],
        ],
    ]); ?>

</div>
