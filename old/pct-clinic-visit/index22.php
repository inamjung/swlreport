<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HospctclinicvisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อผู้ป่วยที่มีความเสี่ยงต่อโรค Stroke & MI';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-clinic-visit-index2">

    <div class="alert alert-warning" role="alert"><h3><?= Html::encode($this->title) ?></h3>รอรับเข้าระบบ</div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?= Html::a('Create Hospctclinicvisit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
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
        ]]);?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'vn',
            //'vstdate',
            [
                'attribute' => 'hn',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'patientName',
                'headerOptions' => ['class' => 'text-center'],                
            ],
           //'age',
            [
                'class' => '\kartik\grid\FormulaColumn',
                'header'=>'อายุ(ปี)',    
                'value' => function ($model, $key, $index, $widget) {
                    $p = compact('model', 'key', 'index');
                    // Write your formula below
                    $birthday = new DateTime($model->hospatient->birthday);         
                    $today = new DateTime();
                    $daysToCount = $today->diff($birthday, false)->y;
                    return $daysToCount;
                },
                    'headerOptions' => ['class'=>'text-center'],
                    'contentOptions' => ['class'=>'text-center'],
         ],  
            [
                'attribute' => 'icd10',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'cvd_risk',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'gfr_ckd',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'cr',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            
            [
                'attribute' => 'stage',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'fbs',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            
//            [
//                'attribute' => 'clinic',
//                'value' => 'hosclinic.name',
//                'headerOptions' => ['class' => 'text-center'],
//            ],
//            [
//                'attribute' => 'birthday',
//                'value' => 'hospatient.birthday',
//                'headerOptions' => ['class' => 'text-center'],
//            ],            

            // 'smoke', 
            // 'gfr_thai',             
            // 'stage', 
            // 'urine_protein',
            // 'hdl',
            // 'ldl',
            // 'cholesterol',
            // 'triglyceride',
            // 'hba1c',
            // 'microalbumin',
            // 'fbs',
            // 'bps',
            // 'bpd',
            // 'lat',
            // 'lng',
            // 'hosconfirm',
            // 'ssoconfirm',
             //'sendto',
            
            [
                'class' => 'yii\grid\ActionColumn',
                'options'=>['style'=>'width:95px;'],
                'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">{view}{update}</div>',
                'buttons'=>[
                    'view'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-search"></i>',$url,['class'=>'btn btn-default']);
                    }, 
                    'update'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>',['pct-clinic-visit/updatehos','id'=>$model->vn],                                  
                            [                            
                             'class' => 'activity-update-link btn btn-default',
                                'title' => 'เปิดดูข้อมูล',
                                'data-toggle' => 'modal',
                                'data-target' => '#activity-modal',
                                'data-id' => $key,
                                'data-pjax' => '0',
                    
                            ]);
                    },
//                    'delete'=>function($url,$model,$key){
//                         return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url,[
//                                'title' => Yii::t('yii', 'Delete'),
//                                'data-confirm' => Yii::t('yii', 'คุณต้องการลบไฟล์นี้?'),
//                                'data-method' => 'post',
//                                'data-pjax' => '0',
//                                'class'=>'btn btn-default'
//                                ]);
//                    }
                ]
            ],          
        ],
    ]); ?>

</div>

