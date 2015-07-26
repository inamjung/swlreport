<?php
$this->title = 'จำนวนใบสั่งยา Diarrhea - จ่ายATB';
$this->params['breadcrumbs'][] = ['label' => 'รายงานPHAR', 'url' => ['phar/index']];
$this->params['breadcrumbs'][]=$this->title;
//use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
?>

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
            
       <div class="col-xs-4 col-sm-4 col-md-2">
            <button class='btn btn-danger'>ประมวลผล</button>
        </div>    
         
</div>
        
    </form>
    
</div>



<?php Pjax::begin();?> 
    <?php
    $gridColumns = [
    ['class'=>'kartik\grid\SerialColumn'],
            [
            'label'=>'แพทย์',
            'attribute'=>'doc',
            'pageSummary' => 'รวม ',
            'headerOptions' => ['class'=>'text-center'],
            
        ],
    
    
    
     [
            'class' => 'kartik\grid\DataColumn',
            'label'=>'รวมใบสั่งยา',
            'attribute'=>'total',
            'pageSummary' => true,
            'vAlign' => 'middle',
            'headerOptions' => ['class'=>'text-center'],    
            'contentOptions' => ['class'=>'text-center'],
        ],
         [
            'label'=>'จ่าย ATB',
            'attribute'=>'atb',
            'pageSummary' => true,
            'vAlign' => 'middle',
            'headerOptions' => ['class'=>'text-center'],    
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'class' => '\kartik\grid\FormulaColumn',
            'header' => 'ร้อยละ',
            'value' => function ($model, $key, $index, $widget) {
                $p = compact('model', 'key', 'index');
                // เขียนสูตร
                $target = $widget->col(2, $p);
                if ($target > 0) {
                    $persent = $widget->col(3, $p)*100 / $target ;
                    $persent = number_format($persent, 2);
                    return $persent;
                }
            },
            'headerOptions' => ['class'=>'text-center'],    
            'contentOptions' => ['class'=>'text-center'],
        ]

           
            ];           
            echo GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => $gridColumns,
            'responsive' => true,
            'hover' => true,
            'floatHeader' => FALSE,        
            'showPageSummary' => true,
            'panel' => [           
                'type' => GridView::TYPE_INFO,
                'heading' => 'จำนวนใบสั่งยา Diarrhea - จ่ายATB ',
                        ],
                    ]);
            ?>
<?php Pjax::end();?>
</div>


