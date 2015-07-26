<?php
$this->title = 'รายชื่อผู้ป่วยในทะเบียนคลินิกโรคไตวายเรื้อรัง_CKD (แยกตำบล)';
$this->params['breadcrumbs'][] = ['label' => 'รายงานNCD', 'url' => ['ncd/index']];
$this->params['breadcrumbs'][] = ['label' => 'รายงาน CKD', 'url' => ['ckd/index']];
$this->params['breadcrumbs'][]=$this->title;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;

function filter($tmbpart) {
    $filtertmbpart = Yii::$app->request->getQueryParam('filtertmbpart', ''); 
    if (strlen($filtertmbpart) > 0) {
        if (strpos($tmbpart['tmbpart'], $filtertmbpart) !== false) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
   
}
$filteredData = array_filter($rawData, 'filter');
$searchModel = ['tmbpart' => Yii::$app->request->getQueryParam('filtertmbpart', '')];

$dataProvider = new ArrayDataProvider([

    'allModels' => $filteredData,
     'sort' => [
         'attributes' => count($rawData[0])>0?array_keys($rawData[0]):array()
        ],
]);
?>

<a href="#" id="btn_sql">ชุดคำสั่ง</a>
<div id="sql" style="display: none"><?= $sql ?></div>



<?php
if (isset($dataProvider))
    $dev = \yii\helpers\Html::a('คุณไอน้ำ เรืองโพน', 'https://fb.com/inam06', ['target' => '_blank']);
    
    
 
    $gridColumns = [
    ['class'=>'kartik\grid\SerialColumn'],
        [
            'attribute' => 'hn',
            'label' => 'HN'
        ],
        [
            'attribute' => 'ptname',
            'label' => 'ชื่อ-สกุล'
        ],
        [
            'attribute' => 'age',
            'label' => 'อายุ',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'attribute' => 'adr',
            'header' => 'ที่อยู่'
        ],
        [
            'attribute' => 'tmbpart',
            'header' => 'ตำบล',
            'filter'=>  Html::dropDownList('filtertmbpart', 
                    isset($_GET['filtertmbpart'])?$_GET['filtertmbpart']:'', 
                        [''=>'','01'=>'ศรีวิไล','02'=>'ชุมภูพร','03'=>'นาแสง','04'=>'นาสะแบง','05'=>'นาสิงห์'],['class'=>'form-control'])
        
            ],
        
  
       ];           
            echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $gridColumns,
            'responsive' => true,
            'hover' => true,
            'floatHeader' => FALSE,        
            //'showPageSummary' => true,
            'panel' => [           
                'type' => GridView::TYPE_SUCCESS,
                'heading' => 'รายชื่อผู้ป่วยในทะเบียนคลินิกโรคไตวายเรื้อรัง_CKD (แยกตำบล)',
                        ],
                    ]);
            ?>



<?php
$script = <<< JS
$(function(){
    $("label[title='Show all data']").hide();
});
        
$('#btn_sql').on('click', function(e) {
    
   $('#sql').toggle();
});
JS;
$this->registerJs($script);
?>

