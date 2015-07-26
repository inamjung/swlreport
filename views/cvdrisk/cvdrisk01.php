<?php

$this->title = 'รายชื่อผู้ป่วยความดันโลหิตสูง ที่เสี่ยงต่อ CVD-RISK เฉพาะมีผลคลอเรสเตอรอล(แยกตำบล)';
$this->params['breadcrumbs'][] = ['label' => 'รายงาน NCD', 'url' => ['ncd/index']];
$this->params['breadcrumbs'][] = ['label' => 'รายงาน CVD-RISK', 'url' => ['cvdrisk/index']];
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
         $list= ArrayHelper::map(Hospcode::find()->all(), 'tmbpart', 'name');
            echo Select2::widget([
            'name' => 'tmbpart',
            'data' => $list,
            'value'=>$tmbpart,
            'size' => Select2::MEDIUM,
            'options' => ['placeholder' => 'เลือก ตำบล...'],
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

<?php Pjax::begin();?> 
<?php
echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'responsive' => TRUE,
    'hover' => true,
    'floatHeader' => FALSE,
    'panel' => [
        'heading'=>'รายชื่อผู้ป่วย ความดันโลหิตสูงที่เสี่ยงต่อ CVD-RISK เฉพาะมีผลคลอเรสเตอรอล(แยกตำบล)',
        'before' => '',
        'type' => \kartik\grid\GridView::TYPE_SUCCESS,
       
    ],
    'columns'=>[
        ['class'=>'yii\grid\SerialColumn'],
        
        [
            'label'=>'วันที่',
            'attribute'=>'vstdate'
        ],
        [
            'label'=>'HN',
            'attribute'=>'hn'
        ],
        [
            'label'=>'ชื่อ-สกุล',
            'attribute'=>'ptname',
            'headerOptions' => ['class'=>'text-center'],            
        ],
        [
            'label'=>'เพศ',
            'attribute'=>'sex'
        ],
        [
            'label'=>'อายุ',
            'attribute'=>'age',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'ที่อยู่',
            'attribute'=>'adrfull',
            'headerOptions' => ['class'=>'text-center'],            
        ],
        [
            'label'=>'บุหรี่',
            'attribute'=>'smoke',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],        
        [
            'label'=>'BP',
            'attribute'=>'bp',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'TC',
            'attribute'=>'tc',
            
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],        
        [
            'label'=>'Stage',
            'attribute'=>'stage',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
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