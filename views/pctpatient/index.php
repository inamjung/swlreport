<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Pctaddress;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PctpatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อผู้ป่วยในทะเบียน STROKE & MI';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="pctpatient-index">

    
   <div class="alert alert-info" role="alert"><h4><?= Html::encode($this->title) ?></h4></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ลงทะเบียนรายใหม่', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
<?php Pjax::begin() ?>
  <?php
   
    $gridColumns = [
    ['class'=>'kartik\grid\SerialColumn'],

            //'id',
        [
            'attribute' => 'name',
            'label' => 'ชื่อ-สกุล',
            'value' => function($model) { return $model->pname  . ' ' . $model->name ;},
            'contentOptions'=>['style'=>'width: 180px;']
        ],

            [
                'attribute' => 'age',           
                'headerOptions' => ['class'=>'text-center'],
                'contentOptions' => ['class'=>'text-center','style'=>'width: 10px;'],    
             ],
              //'hn',       
            // 'birthday',                    
            [
                'attribute' => 'addrpart',
                'label' => 'บ้านเลขที่',
                'value' => function($model) { return $model->addrpart  . 'หมู่ที่ ' . $model->moo ;},
                'contentOptions'=>['style'=>'width: 120px;']
             ],  
             [
                  'attribute'=>'moopart',
                  'value'=>'moopart',
                  'filter'=>ArrayHelper::map(app\models\Pctmooban::find()->orderBy('mooban')->asArray()->all(), 'mooban', 'mooban'),  
                    'vAlign'=>'middle',                    
                    'filterType'=>GridView::FILTER_SELECT2,           
                    'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                    //'format'=>'raw'    
                ],
                  'headerOptions'=>['class'=>'text-center'],
                  'contentOptions' => ['class'=>'text-center','style'=>'width: 120px;'],  
                  'filterInputOptions'=>['placeholder'=>'เลือก หมู่บ้าน'],
              ], 
             [
                  'attribute'=>'tmbpart_id',
                  'value'=>'address.name',
                  'filter'=>ArrayHelper::map(app\models\Pctaddress::find()->orderBy('tmbpart')->asArray()->all(), 'name', 'name'),  
                    'vAlign'=>'middle',                    
                    'filterType'=>GridView::FILTER_SELECT2,           
                    'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                    //'format'=>'raw'    
                ],
                  'headerOptions'=>['class'=>'text-center'],
                  'contentOptions' => ['class'=>'text-center','style'=>'width: 100px;'],  
                  'filterInputOptions'=>['placeholder'=>'เลือก ตำบล'],
              ], 
           
              [
                  'attribute'=>'main_pdx',
                  'value'=>'main_pdx',
                  'filter'=>ArrayHelper::map(app\models\Pctdisease::find()->orderBy('code')->asArray()->all(), 'code', 'code'),  
                    'vAlign'=>'middle',                    
                    'filterType'=>GridView::FILTER_SELECT2,           
                    'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                    //'format'=>'raw'    
                ],
                  'headerOptions'=>['class'=>'text-center'],
                  'contentOptions' => ['class'=>'text-center','style'=>'width: 100px;'],  
                  'filterInputOptions'=>['placeholder'=>'เลือก ICD10'],
              ],           
              [
                  'attribute'=>'drug',
                  'value'=>'drug',
                  'filter'=>ArrayHelper::map(app\models\Pctdrug::find()->asArray()->all(), 'drug', 'drug'),  
                    'vAlign'=>'middle',                    
                    'filterType'=>GridView::FILTER_SELECT2,           
                    'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                    //'format'=>'raw'    
                ],
                  'headerOptions'=>['class'=>'text-center'],
                  'contentOptions' => ['class'=>'text-center','style'=>'width: 100px;'],  
                  'filterInputOptions'=>['placeholder'=>'เลือก ยา'],
              ],    
                                    
             [
                  'attribute'=>'hospcode',
                  'value'=>'hospcodes.name',
                  'filter'=>ArrayHelper::map(app\models\Pcthospcode::find()->orderBy('tmbpart')->asArray()->all(), 'name', 'name'),  
                    'vAlign'=>'middle',                    
                    'filterType'=>GridView::FILTER_SELECT2,           
                    'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                    //'format'=>'raw'    
                ],
                  'headerOptions'=>['class'=>'text-center'],
                  'contentOptions' => ['class'=>'text-center','style'=>'width: 100px;'],  
                  'filterInputOptions'=>['placeholder'=>'เลือก รพ.สต'],
              ],
               [
                'attribute' => 'ptype',
                'contentOptions' => ['class'=>'text-center','style'=>'width: 50px;'],
                'filter' => \app\models\Pctpatient::$ptypes,
                'value' => function($data) {
                    return \app\models\Pctpatient::$ptypes[$data->ptype];
                }
             ], 
             [
                'attribute' => 'pstatus',
                'contentOptions' => ['class'=>'text-center','style'=>'width: 90px;'],
                'filter' => \app\models\Pctpatient::$pstatuses,
                'value' => function($data) {
                    return \app\models\Pctpatient::$pstatuses[$data->pstatus];
                }
             ],             
//             [
//                'attribute' => 'status',
//                 'contentOptions' => ['class'=>'text-center','style'=>'width: 90px;'],
//                'filter' => \app\models\Pctpatient::$statuses,
//                'value' => function($data) {
//                    return \app\models\Pctpatient::$statuses[$data->status];
//                }
//             ],            
            // 'regdate',           
            // 'cid',        
            // 'amppart_id',
            // 'chwpart_id',
            // 'tel', 
            // 'pdx1',            
            // 'gis',
            // 'latitude',
            // 'longitude',
            // 'avatar1',
            // 'username',
            // 'createdate',
            // 'updatedate',
            // 'docs',
            // 'covenant',
            // 'ref',
//        [
//        'class'=>'kartik\grid\ActionColumn',
//        'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">{view}</div>',
//                'buttons'=>[
//                    'view'=>function($url,$model,$key){
//                        return Html::a('<i class="glyphicon glyphicon-search"></i> ข้อมูล',$url,['class'=>'btn btn-info']);
//                    }, 
//           ]                 
//    ],
 [
  'class' => 'kartik\grid\ActionColumn',
  'template'=>'{copy} {view} {update}',
  'buttons'=>[
    
    'view' => function($url,$model,$key){
        return $model->status !== 1 ? Html::a('<i class="glyphicon glyphicon-search"></i>',$url) : null;
      },       
    ],
]   
        
];
echo GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'responsive' => true,
        'hover' => true,
       // 'floatHeader' => true,        
        //'showPageSummary' => true,
        'beforeHeader'=>[''],
        'panel' => [           
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '',
        ],
    ]);
    ?>
 <?php Pjax::end() ?>   
</div>
