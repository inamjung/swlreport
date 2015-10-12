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
<div class="hospctclinicvisit-index">

    <div class="alert alert-danger" role="alert"><h3><?= Html::encode($this->title) ?></h3>รับเข้าระบบแล้ว</div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?= Html::a('Create Hospctclinicvisit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

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
            'attribute' =>  'hn',
            'label' => 'HN',
            'format'=>'raw', 
                        'value' => function($model, $key, $index, $column) {
                    return Html::a($model->hn, '#', [
                                'class' => 'activity-view-link',
                                'title' => 'เปิดดูข้อมูล',
                                'data-toggle' => 'modal',
                                'data-target' => '#activity-modal',
                                'data-id' => $key,
                                'data-pjax' => '0',
                    ]);
                },
                'headerOptions' => ['class' => 'text-center','style'=>'width:80px;'],
        ],             
            [
                'label'=>'ชื่อ-สกุล',
                'attribute' => 'patientName',
                'headerOptions' => ['class' => 'text-center','style'=>'width:200px;'],                
            ],
            [
                'label'=>'Dx',
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
                'label'=>'TC',
                'attribute' => 'cholesterol',
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
                'attribute' => 'stage',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
             'hdl',
             'ldl',
             'fbs',
//            [
//                'attribute' => 'clinic',
//                'value' => 'hosclinic.name',
//                'headerOptions' => ['class' => 'text-center'],
//            ],
            
            [
                'label'=>'Bp',
                'attribute' => 'bp',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
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
            
            [
                'class' => 'yii\grid\ActionColumn',
                'options'=>['style'=>'width:100px;'],
                'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">{view}{update}</div>',
                'buttons'=>[
                    'view'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-search"></i>',$url,['class'=>'btn btn-default']);
                    }, 
                    'update'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>',['pct-clinic-visit/update','id'=>$model->vn],
                            [
                                'class' => 'activity-update-link btn btn-default',
                                'title' => 'เปิดดูข้อมูล',
                                'data-toggle' => 'modal',
                                'data-target' => '#activity-modal',
                                'data-id' => $key,
                                'data-pjax' => '0',
                                
                                ]);
                    },
//                    
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

<?php
                    Modal::begin([
                        'id' => 'activity-modal',
                        'header' => '<h4 class="modal-title"></h4>',
                        'size' => 'modal-lg',
                        'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>',
                    ]);
                    Modal::end();
                    ?>
                    <?php $this->registerJs('
        function init_click_handlers(){
            $("#activity-create-link").click(function(e) {
                    $.get(
                        "?r=service/create",
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("เพิ่มข้อมูลสมาชิก");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-view-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    var $td = $(this).closest("tr").children("td");
                     var sr = $td.eq(1).text();
                    $.get(
                        "?r=pct-clinic-visit/indivhosconfirm",                        
                        {
                            hn: sr
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-update-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=pct-clinic-visit/update",
                        {
                           id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("รับผู้ป่วยที่มีความเสี่ยงเข้าระบบ");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            
        }
        init_click_handlers(); //first run
        $("#customer_pjax_id").on("pjax:success", function() {
          init_click_handlers(); //reactivate links in grid after pjax update
        });'); ?>