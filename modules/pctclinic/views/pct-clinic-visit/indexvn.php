
<?php

use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use yii\data\ArrayDataProvider;
use yii\bootstrap\Modal;
use yii\helpers\Url;
?>
<?php

function filter($col) {
    $filterresult = Yii::$app->request->getQueryParam('filterresult', '');
    if (strlen($filterresult) > 0) {
        if (strpos($col['result'], $filterresult) !== false) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

$filteredData = array_filter($rawData, 'filter');
$searchModel = ['result' => Yii::$app->request->getQueryParam('$filterresult', '')];

$dataProvider = new ArrayDataProvider([

    'allModels' => $filteredData,
    'pagination' => false,
    'sort' => [
        'attributes' => count($rawData[0]) > 0 ? array_keys($rawData[0]) : array()
        ]]);

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'label' => 'วันที่ตรวจ',
        'attribute' => 'vstdate',
        'format' => 'raw',
        'value' => function($model) {
            return Html::a(Html::encode($model['vstdate']), [
                        'pct-clinic-visit/indivhosdrug',
                        'vn' => $model['vn']
                    ]);
        },
        'headerOptions' => ['class' => 'text-center', 'style' => 'width: 95px;'],
    ],
//    [
//        'attribute' => 'vn',
//        'label' => 'VN',
//        'format' => 'raw',
//        'value' => function($model) {
//            return Html::a(Html::encode($model['vn']), [
//                        'pct-clinic-visit/indivhosdrug',
//                        'vn' => $model['vn']
//                    ]);
//        },
//                'headerOptions' => ['class' => 'text-center'],
//            ],
            [
                'label' => 'HN',
                'attribute' => 'hn',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'label' => 'Dx',
                'attribute' => 'icd10',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'cr',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'label' => 'TC',
                'attribute' => 'cholesterol',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'label' => 'Cvd',
                'attribute' => 'cvd_risk',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'label' => 'Ckd',
                'attribute' => 'gfr_ckd',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'stage',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            'hdl',
            'ldl',
            'fbs',
            'bps',
            'bpd',
            [                
            'class' => 'kartik\grid\BooleanColumn',
            'attribute' => 'dasa',
            'label' => 'ASA',    
            'vAlign' => 'middle',
            ], 
                [                
            'class' => 'kartik\grid\BooleanColumn',
            'attribute' => 'dplavix',
            'label' => 'Plavix',    
            'vAlign' => 'middle',
            ], 
               [                
            'class' => 'kartik\grid\BooleanColumn',
            'attribute' => 'dsk',
            'label' => 'SK',    
            'vAlign' => 'middle',
            ],
            
            
                // 'smoke', 
                // 'gfr_thai', 
                // 'urine_protein',
                // 'triglyceride',
                // 'hba1c',
                // 'microalbumin',            
                // 'bps',
                // 'bpd',
                // 'lat',
                // 'lng',
                //'hosconfirm',
                // 'ssoconfirm',
                // 'sendto',
//        [
//            'class' => '\kartik\grid\FormulaColumn',
//            'header' => 'ร้อยละ',
//            'value' => function ($model, $key, $index, $widget) {
//                $p = compact('model', 'key', 'index');
//                // เขียนสูตร
//                $target = $widget->col(2, $p);
//                if ($target > 0) {
//                    $persent = $widget->col(3, $p)*100 / $target ;
//                    $persent = number_format($persent, 2);
//                    return $persent;
//                }
//            },
//            'headerOptions' => ['class'=>'text-center'],    
//            'contentOptions' => ['class'=>'text-center'],
//        ]
        ];
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'], 
            //'filterModel' => $searchModel,
            'columns' => $gridColumns,
            'responsive' => true,
            'hover' => true,
            'floatHeader' => FALSE,
            //'showPageSummary' => true,
            'panel' => [
                'type' => GridView::TYPE_INFO,
                'heading' => 'ประวัติผลการตรวจรักษา',
//                'value'=> function($model){
//                    return $model->dep;
//                    }
            ],
        ]);
        ?>

        </div>



        <?php
        // You only need add this,
        $this->registerJs('
        var gridview_id = ""; // specific gridview
        
        var columns = [4]; //that will grouping, start 1
 
        /*
        DON\'T EDIT HERE
 
http://www.hafidmukhlasin.com
 
        */
        var column_data = [];
            column_start = [];
            rowspan = [];
 
        for (var i = 0; i < columns.length; i++) {
            column = columns[i];
            column_data[column] = "";
            column_start[column] = null;
            rowspan[column] = 1;
        }
 
        var row = 1;
        $(gridview_id+" table > tbody  > tr").each(function() {
            var col = 1;
            $(this).find("td").each(function(){
                for (var i = 0; i < columns.length; i++) {
                    if(col==columns[i]){
                        if(column_data[columns[i]] == $(this).html()){
                            $(this).remove();
                            rowspan[columns[i]]++;
                            $(column_start[columns[i]]).attr("rowspan",rowspan[columns[i]]);
                        }
                        else{
                            column_data[columns[i]] = $(this).html();
                            rowspan[columns[i]] = 1;
                            column_start[columns[i]] = $(this);
                        }
                    }
                }
                col++;
            })
            row++;
        });
    ');
        ?>

