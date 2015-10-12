<?php

$this->title = 'คืนข้อมูล รพ.สต. ผู้ป่วย Refer';
//$this->params['breadcrumbs'][] = ['label' => 'รายงาน NCD', 'url' => ['ncd/index']];
//$this->params['breadcrumbs'][] = ['label' => 'รายงาน CVD-RISK', 'url' => ['cvdrisk/index']];
$this->params['breadcrumbs'][]=$this->title;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;
use yii\widgets\Pjax;
use app\models\Hospcode;
use kartik\widgets\Select2;
?>

<a href="#" id="btn_sql">ชุดคำสั่ง</a>
<div id="sql" style="display: none"><?= $sql ?></div>

<?php
if (isset($dataProvider))
    $dev = \yii\helpers\Html::a('คุณไอน้ำ เรืองโพน', 'https://fb.com/inam06', ['target' => '_blank']);?>

<div class='well'>
    <form method="POST">
        ระหว่างวันที่:
        <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-5">
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
            'options'=>[
                'class'=>'form-control'
            ],
        ]);
        ?>           
        ถึงวันที่:
        <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ],
            'options'=>[
                'class'=>'form-control'
            ],            
        ]);
        ?>
        </div>        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?php
         $list= ArrayHelper::map(Hospcode::find()->all(), 'hospcode', 'name');
            echo Select2::widget([
            'name' => 'tmbpart',
            'data' => $list,
            //'value'=>$tmbpart,
            'size' => Select2::MEDIUM,
            'options' => ['placeholder' => 'เลือกสถานบริการ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
            ?>
        </div>    
                <div class="col-xs-4 col-sm-4 col-md-2">
            <button class='btn btn-danger'>ประมวลผล</button>
        </div>    
         
</div>
        
    </form>
    
</div>

<?php Pjax::begin(); 

echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
    'responsive' => TRUE,
    'hover' => true,
    'floatHeader' => FALSE,
    'panel' => [
        'heading'=>'รายชื่อผู้ป่วย Refer ที่ รพ.ศรีวิไล ',
        'before' => '',
        'type' => \kartik\grid\GridView::TYPE_WARNING,
       
    ],
    'columns'=>[
        ['class'=>'yii\grid\SerialColumn'],
        
        [
            'attribute' => 'refer_date',
            'label' => 'วันที่',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center']
            ],
            [
            'attribute' => 'hn',
            'label' => 'HN',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center']
            ],
            [
            'attribute' => 'cid',
            'label' => 'CID',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center']
            ],
            [
            'attribute' => 'full_name',
            'label' => 'ชื่อ - สกุล',
            'headerOptions' => ['class'=>'text-center'],
            //'contentOptions' => ['class'=>'text-center']
            ],
            //'ptname',
            //'refer_number',
            [
            'attribute' => 'refer_number',
            'label' => 'เลขที่ Refer',
            'headerOptions' => ['class'=>'text-center'],
            //'contentOptions' => ['class'=>'text-center']
            ],
            //'refer_point',
            [
            'attribute' => 'refer_point',
            'label' => 'แผนก',
            'headerOptions' => ['class'=>'text-center'],
            //'contentOptions' => ['class'=>'text-center']
            ],
            //'department',
            [
            'attribute' => 'ptname',
            'label' => 'สิทธิ์การรักษา',
            'headerOptions' => ['class'=>'text-center'],
            //'contentOptions' => ['class'=>'text-center']
            ],
            'pdx',
            //'icdn',
            [
            'attribute' => 'icdn',
            'label' => 'ชื่อโรค',
            'headerOptions' => ['class'=>'text-center'],
            //'contentOptions' => ['class'=>'text-center']
            ],
            //'tname',
            [
            'attribute' => 'tname',
            'label' => 'ชื่อโรค',
            'headerOptions' => ['class'=>'text-center'],
            //'contentOptions' => ['class'=>'text-center']
            ],
            //'pttype',
            //'informaddr',
            [
            'attribute' => 'informaddr',
            'label' => 'ที่อยู่',
            'headerOptions' => ['class'=>'text-center'],
            //'contentOptions' => ['class'=>'text-center']
            ],
            //'hospcode',
            //'hospname',
            //'name',
             [
            'attribute' => 'hospname',
            'label' => 'รพ.ที่ส่งต่อ',
            'headerOptions' => ['class'=>'text-center'],
            //'contentOptions' => ['class'=>'text-center']
            ],

       ],    
]);





$script = <<< JS
$(function(){
    $("label[title='Show all data']").hide();
});
        
$('#btn_sql').on('click', function(e) {
    
   $('#sql').toggle();
});
JS;
$this->registerJs($script);
