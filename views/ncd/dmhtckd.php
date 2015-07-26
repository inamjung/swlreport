<?php
$this->title = 'รายชื่อผู้ป่วยในทะเบียนคลินิกเบาหวานที่มีโรคความดันโลหิตสูงและโรคไตวายเรื้อรังร่วม(DM+HT+CKD)_มีผลแลป (แยกตำบล)';
$this->params['breadcrumbs'][] = ['label' => 'รายงานNCD', 'url' => ['ncd/index']];
$this->params['breadcrumbs'][] = ['label' => 'DM', 'url' => ['ncd/indexdm']];
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
        'heading'=>'รายชื่อผู้ป่วยในทะเบียนคลินิกเบาหวานที่มีโรคความดันโลหิตสูงและโรคไตวายเรื้อรังร่วม(DM+HT+CKD)_มีผลแลป',
        'before' => '',
        'type' => \kartik\grid\GridView::TYPE_SUCCESS,
       
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
            'label'=>'อายุ',
            'attribute'=>'age_y'
        ],
        [
            'label'=>'ที่อยู่',
            'attribute'=>'ad1'
        ],
        [
            'label'=>'บุหรี่',
            'attribute'=>'smoke'
        ],
        [
            'label'=>'สุรา',
            'attribute'=>'drink'
        ],
        [
            'label'=>'ที่อยู่',
            'attribute'=>'ad1'
        ],
        [
            'label'=>'micro_albu',
            'attribute'=>'micro_albumin1',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'HbA1c',
            'attribute'=>'HbA1c1',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'LDL',
            'attribute'=>'LDL1',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'K+',
            'attribute'=>'K1',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'Bicarb',
            'attribute'=>'bicarb1',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'วันที่ล่าสุด',
            'attribute'=>'Cr_date'
        ],
        [
            'label'=>'Crล่าสุด',
            'attribute'=>'cr',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        
        [
            'label'=>'วันที่ครั้งก่อน',
            'attribute'=>'Cr_date1',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'Cr1ครั้งก่อน',
            'attribute'=>'cr1',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'GFRครั้งก่อน',
            'attribute'=>'GFR1',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'GFRล่าสุด',
            'attribute'=>'GFR',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'class' => '\kartik\grid\FormulaColumn',
            'header' => 'Stage',
            'value' => function ($model, $key, $index, $widget) {
                $p = compact('model', 'key', 'index');
                // เขียนสูตร
                $target = $widget->col(18, $p);
                if ($target > 100) {
                    $stage ='ปกติ';
                    return $stage;
                }else if ($target >=90) {
                    $stage ='1';
                    return $stage;
                }else if ($target>=60) {
                    $stage ='2';
                    return $stage;
                }else if ($target>=30) {
                    $stage ='3';
                    return $stage;
                }else if ($target>=15) {
                    $stage ='4';
                    return $stage;
                }else if ($target<15) {
                    $stage ='5';
                    return $stage;
                }else if ($target<1) {
                    $stage ='ระยะสุดท้าย';
                    return $stage;
                }
            },
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'class' => '\kartik\grid\FormulaColumn',
            'header' => 'ผลต่าง',
            'pageSummary' => true,
            'value' => function ($model, $key, $index, $widget) {
                $total = compact('model', 'key', 'index');                
                $target =  $widget->col(18, $total);
                $target1 = $widget->col(17, $total);
               
                
                if ($target >= 0) {
                    $val =$target-$target1;
                    $val = number_format($val, 0);
                    return $val;
                }
            },
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ]            
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
