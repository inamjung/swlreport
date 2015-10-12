
<?php
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use yii\data\ArrayDataProvider;

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
    ['class'=>'kartik\grid\SerialColumn'],
        
            [
            'label'=>'HN',
           'attribute'=>'hn',            
            'vAlign' => 'middle',
            'headerOptions' => ['class'=>'text-center'],    
            'contentOptions' => ['class'=>'text-center'],
        ],
//        [
//            'label'=>'รายการ',
//            //'attribute'=>'tname',           
//            //'headerOptions' => ['class'=>'text-left'],
//            'format'=>'raw',
//            'value'=> function($model){
//                return Html::a(Html::encode($model['tname']),[
//                    'tools/indivhistorygen',
//                    'tool'=>$model['id']
//                ]) ;
//            }            
//        ], 
        [
            'label'=>'ชื่อ-สกุล',
           'attribute'=>'name',
            'headerOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'โรคประจำตัว',
           'attribute'=>'ptype',
            'headerOptions'=>['class'=>'text-center'],
            'contentOptions'=>['class'=>'text-center']            
        ],
         'cvd_risk',
        'stage',
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
            //'filterModel' => $searchModel,
            'columns' => $gridColumns,
            'responsive' => true,
            'hover' => true,
            'floatHeader' => FALSE,        
           //'showPageSummary' => true,
            'panel' => [           
                'type' => GridView::TYPE_INFO,
                'heading' => 'ประวัติผลการรวจรักษา',
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
        
        var columns = [3]; //that will grouping, start 1
 
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
