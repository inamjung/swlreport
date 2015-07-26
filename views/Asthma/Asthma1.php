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

$this->title = 'จำนวนผู้ป่วยAsthmaและCOPDที่refer';


$this->params['breadcrumbs'][] = ['label' => 'Asthma/COPD', 'url' => ['asthma/index']];


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clinic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
</div>

<div class='well'>
    <form method="POST">
        ระหว่าง:
        <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date1',
            'value' => $date1,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ],
            
        ]);
        ?>
        ถึง:
        <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ]
        ]);
        ?>
        <button class='btn btn-danger'>ประมวลผล</button>
    </form>
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
            'attribute' => 'date',
            'label' => 'วันที่ส่งต่อ'
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
            'label' => 'ที่อยู่'
            ],
            [
            'attribute' => 'per',
            'label' => 'การวินิจฉัยขั้นต้น'
            ],
            [
            'attribute' => 'pdx',
            'label' => 'ICD10'
            ],
            [
            'attribute' => 'hosname',
            'label' => 'สถานที่ส่งต่อ'
            ],
			
			
			
			
			
			
			//'vn',
			
		
			//['class' => 'yii\grid\ActionColumn'],

		],
	
]);