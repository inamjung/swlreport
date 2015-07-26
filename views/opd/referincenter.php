<?php
$this->title = 'จำนวน ReferIn ส่วนกลาง';
$this->params['breadcrumbs'][] = ['label' => 'รายงานOPD', 'url' => ['opd/index']];
$this->params['breadcrumbs'][]=$this->title;

//use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

echo Highcharts::widget([
    'options'=>[        
        'title'=>['text'=>'จำนวน ReferIn ส่วนกลาง'],
        'xAxis'=>[
            'categories'=>$years
        ],
        'yAxis'=>[
            'title'=>['text'=>'จำนวน(คน)']
        ],
        'series'=>[
            [
                'type'=>'column',
                'name'=>'มค',
                'data'=>$jan,
            ],
            [
                'type'=>'column',
                'name'=>'กพ',
                'data'=>$feb,
            ],
            [
                'type'=>'column',
                'name'=>'มีค',
                'data'=>$mar,
            ],
            [
                'type'=>'column',
                'name'=>'เมย',
                'data'=>$apr,
            ],
            [
                'type'=>'column',
                'name'=>'พค',
                'data'=>$may,
            ],
            [
                'type'=>'column',
                'name'=>'มิย',
                'data'=>$jun,
            ],
            [
                'type'=>'column',
                'name'=>'กค',
                'data'=>$july,
            ],
            [
                'type'=>'column',
                'name'=>'สค',
                'data'=>$aug,
            ],
            [
                'type'=>'column',
                'name'=>'กย',
                'data'=>$sep,
            ],
            [
                'type'=>'column',
                'name'=>'ตค',
                'data'=>$oct,
            ],
            [
                'type'=>'column',
                'name'=>'พย',
                'data'=>$nov,
            ],
            [
                'type'=>'column',
                'name'=>'ธค',
                'data'=>$dece,
            ],
        ]
    ]
]);?>

<?php Pjax::begin();?> 
    <?php
    $gridColumns = [
    ['class'=>'kartik\grid\SerialColumn'],
        [
            'label'=>'ปี',
            'attribute'=>'years',
            'pageSummary' => 'รวม ',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        
        [
            'class' => 'kartik\grid\DataColumn',
            'label'=>'มค',
            'attribute'=>'jan',
            'pageSummary' => true,
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
         [
            'class' => 'kartik\grid\DataColumn',
            'pageSummary' => true,
            'label'=>'กพ',
            'attribute'=>'feb',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'pageSummary' => true,
            'label'=>'มีค',
            'attribute'=>'mar',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
         [
            'class' => 'kartik\grid\DataColumn',
            'pageSummary' => true,
            'label'=>'เมย',
            'attribute'=>'apr',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'pageSummary' => true,
            'label'=>'พค',
            'attribute'=>'may',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'label'=>'มิย',
            'attribute'=>'jun',
            'pageSummary' => true,
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
         [
            'class' => 'kartik\grid\DataColumn',
            'pageSummary' => true,
            'label'=>'กค',
            'attribute'=>'july',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'pageSummary' => true,
            'label'=>'สค',
            'attribute'=>'aug',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
         [
            'class' => 'kartik\grid\DataColumn',
            'pageSummary' => true,
            'label'=>'กย',
            'attribute'=>'sep',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'pageSummary' => true,
            'label'=>'ตค',
            'attribute'=>'oct',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'pageSummary' => true,
            'label'=>'พย',
            'attribute'=>'nov',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'pageSummary' => true,
            'label'=>'ธค',
            'attribute'=>'dece',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'class' => '\kartik\grid\FormulaColumn',
            'header' => 'รวม/ปี',
            'pageSummary' => true,
            'value' => function ($model, $key, $index, $widget) {
                $total = compact('model', 'key', 'index');
                // สูตร เพิ่มคอลัม
                $target =  $widget->col(2, $total);
                $target1 = $widget->col(3, $total);
                $target2 = $widget->col(4, $total);
                $target3 = $widget->col(5, $total);
                $target4 = $widget->col(6, $total);
                $target5 =  $widget->col(7, $total);
                $target6 = $widget->col(8, $total);
                $target7 = $widget->col(9, $total);
                $target8 = $widget->col(10, $total);
                $target9 = $widget->col(11, $total);
                $target10 = $widget->col(12, $total);
                $target11 = $widget->col(13, $total);
                
                if ($target >= 0) {
                    $amount =$target+$target1+$target2+$target3+$target4+
                            $target5+$target6+$target7+$target8+$target9+
                            $target10+$target11;
                    $amount = number_format($amount, 0);
                    return $amount;
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
                'type' => GridView::TYPE_PRIMARY,
                'heading' => 'จำนวน ReferIn ส่วนกลาง ',
                        ],
                    ]);
            ?>
<?php Pjax::end();?>
</div>

