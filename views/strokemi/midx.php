<?php

$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['main/index']];
$this->params['breadcrumbs'][] = ['label' => 'strokemi', 'url' => ['strokemi/index']];
$this->params['breadcrumbs'][]=$this->title;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;
use yii\widgets\Pjax;
use app\models\Hospcode;
use kartik\widgets\Select2;


function filter($smoke) {
    $filtersmoke = Yii::$app->request->getQueryParam('filtersmoke', ''); 
    if (strlen($filtersmoke) > 0) {
        if (strpos($smoke['smoke'], $filtersmoke) !== false) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
   
}
$filteredData = array_filter($rawData, 'filter');
$searchModel = ['sex' => Yii::$app->request->getQueryParam('filtersmoke', '')];

$dataProvider = new ArrayDataProvider([

    'allModels' => $filteredData,
     'sort' => [
         'attributes' => count($rawData[0])>0?array_keys($rawData[0]):array()
        ],
]);

echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,   
    'formatter'=>['class'=>'yii\i18n\Formatter','nullDisplay'=>'-'],   
    'filterModel' => $searchModel,
    'responsive' => TRUE,
    'hover' => true,
    'floatHeader' => FALSE,
    'panel' => [
        'heading'=>'รายชื่อผู้ป่วยMI รหัสโรคI20 กับ I21-I259',
        'before' => '',
        'type' => \kartik\grid\GridView::TYPE_WARNING,
       
    ],
    'columns'=>[
        ['class'=>'yii\grid\SerialColumn'],
        
        [
            'label'=>'HN',
            'attribute'=>'hn'
        ],
        [
            'label'=>'ชื่อ-สกุล',
            'attribute'=>'ptname'
        ],
        [
            'label'=>'เพศ',
            'attribute'=>'sex',
            'headerOptions' => ['class'=>'text-center'],            
        ],
        [
            'label'=>'อายุ',
            'attribute'=>'age_y'
        ],
        [
            'label'=>'ICD10',
            'attribute'=>'pdx',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'ที่อยู่',
            'attribute'=>'dd',
            'headerOptions' => ['class'=>'text-center'],            
        ],
//        [
//            'label'=>'บุหรี่',
//            'attribute'=>'smoking_type_name',
//            'headerOptions' => ['class'=>'text-center'],
//            'contentOptions' => ['class'=>'text-left'],
//        ],        
        [
            'label'=>'สุรา',
            'attribute'=>'drinking_type_name',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-left'],
        ],
        [
            'attribute' => 'smoke',            
            //'value' => 'sex',
            'label'=>'บุหรี่',
            'filter'=>  Html::dropDownList('filtersmoke',  
                    isset($_GET['filtersmoke'])?$_GET['filtersmoke']:'',
                    [''=>'','ไม่เคยสูบ'=>'ไม่เคยสูบ','ยังสูบอยู่ หรือเลิกสูบได้ยังไม่ถึง 1 เดือน'=>'ยังสูบอยู่ หรือเลิกสูบได้ยังไม่ถึง 1 เดือน',
                        'เลิกสูบแล้วอย่างน้อย 1 เดือน'=>'เลิกสูบแล้วอย่างน้อย 1 เดือน','ไม่ได้ซัก'=>'ไม่ได้ซัก'
                        ],['class'=>'form-control'])
        ]
       ],    
]);


?>
