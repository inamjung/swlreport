<?php

use yii\jui\DatePicker;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClinicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้ป่วยAsthmaCOPDที่พ่นยาห้องฉุกเฉิน';


$this->params['breadcrumbs'][] = ['label' => 'Asthma/COPD', 'url' => ['asthma/index']];


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clinic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel'=> [
        	'before' => ''
        ],
        

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			
            [
            'attribute' => 'vstdate',
            'label' => 'วันที่'
            ],
            [
            'attribute' => 'hn',
            'label' => 'HN'
            ],
            [
            'attribute' => 'ptname',
            'label' => 'ชื่อ - สกุล'
            ],
            [
            'attribute' => 'address',
            'label' => 'ที่อยู๋'
            ],

            [
            'attribute' => 'drugname',
            'label' => 'ยาที่พ่น'
            ],
             [
            'attribute' => 'qty',
            'label' => 'จำนวนโด๊ส'
            ],
            
            //'icode',
            
           // 'name',
            //'qty',
			//'vn',
			
		
			//['class' => 'yii\grid\ActionColumn'],

		],
	
]);