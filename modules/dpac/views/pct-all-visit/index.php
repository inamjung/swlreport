<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\dpac\models\PctAllVisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pct All Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-all-visit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
        <?= Html::a('คลินิก DPAC', ['dpacdetails/index'], ['class' => 'btn btn-success']) ?>
    
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            [
            'attribute' => 'vn',
            'label' => 'VN',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
            //'options'=> ['style'=>'width:200px;'],
            ],
            //'vstdate',
            
            [
            'attribute' => 'hn',
            'label' => 'HN',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
            //'options'=> ['style'=>'width:200px;'],
            ],
            [
            'attribute' => 'patientName',
            'label' => 'ชื่อ-สกุล',
            'headerOptions' => ['class'=>'text-center'],
            //'contentOptions' => ['class'=>'text-center'],
            //'options'=> ['style'=>'width:200px;'],
            ],
            //'clinic',
            //'icd10',
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
            //'bpd',
            //'smoke',
            [                
            'class' => 'kartik\grid\BooleanColumn',
            'attribute' => 'smoke',
            'label' => 'บุหรี่',    
            'vAlign' => 'middle',
            ],
            // 'lat',
            // 'lng',
            // 'hosconfirm',
            // 'ssoconfirm',
            // 'sendto',
            // 'createdate',
            // 'updatedate',
            [
            'attribute' => 'age',
            'label' => 'อายุ',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
            //'options'=> ['style'=>'width:200px;'],
            ],
            [
            'attribute' => 'bmi',
            'label' => 'BMI',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
            //'options'=> ['style'=>'width:200px;'],
            ],
            'bloodgrp',

            // 'next_app_date',

            //['class' => 'yii\grid\ActionColumn'],

            [
            'class' => 'yii\grid\ActionColumn',
            'options'=>['style'=>'width:50px;'],
            'buttonOptions'=>['class'=>'btn btn-default'],
            'template'=>'<div class="btn-group btn-group-sm text-center" role="group" aria-label="IN">{update}</div>'
         ],

         

        ],
    ]); ?>

</div>
