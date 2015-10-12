<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PctmoobanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Pctmoobans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctmooban-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มหมู่บ้าน', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'mooban',  
            [
                'attribute'=>'tmbpart',
                'value'=>'tmbpart1.name',
                'filter'=>ArrayHelper::map(app\models\Pctaddress::find()->orderBy('tmbpart')->asArray()->all(), 'name', 'name'),  
                    'vAlign'=>'middle',                    
                    'filterType'=>GridView::FILTER_SELECT2,           
                    'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
            ],
                  'headerOptions'=>['class'=>'text-center'],
                  'contentOptions' => ['class'=>'text-center','style'=>'width: 120px;'],  
                  'filterInputOptions'=>['placeholder'=>'เลือก ตำบล'],
              ], 
            [
                'attribute'=>'hospcode',
                'value'=>'hospcode1.name',
                'filter'=>ArrayHelper::map(app\models\Pcthospcode::find()->orderBy('tmbpart')->asArray()->all(), 'name', 'name'),  
                    'vAlign'=>'middle',                    
                    'filterType'=>GridView::FILTER_SELECT2,           
                    'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
            ],
                  'headerOptions'=>['class'=>'text-center'],
                  'contentOptions' => ['class'=>'text-center','style'=>'width: 120px;'],  
                  'filterInputOptions'=>['placeholder'=>'เลือก รพ.สต'],
              ],           
            //'amppart',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
