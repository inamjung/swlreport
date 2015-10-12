<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\modules\pctclinic\models\PctRisk;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\pctclinic\models\PctRiskCareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการเยี่ยมบ้านของ เจ้าหน้าที่ รพ.สต.';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alert alert-success" role="alert"><h3><?= Html::encode($this->title) ?></h3>
    รายการเยี่ยมบ้านเคสเสี่ยง Stroke & MI 
</div>

<div class="pct-risk-care-index">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?= Html::a('Create Pct Risk Care', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           //'id',            
           //'cid',
//            [
//            'attribute' =>  'risk_id',
//            'label' => 'ID',
//            'format'=>'raw', 
//                'value'=> function($model){
//                return Html::a(Html::encode($model['risk_id'].': บันทึกข้อมูล'),[
//                     '/pctclinic/pct-risk/rpstupdate',
//                    'id'=>$model['risk_id']
//                ]) ;
//            },  
//                'headerOptions' => ['class' => 'text-center','style'=>'width:140px;'],
//        ],      
      [
            'attribute' =>  'risk_id',
            'label' => 'ข้อมูล',
            'format'=>'raw', 
                        'value' => function($model, $key, $index, $column) {
                    return Html::a($model->risk_id, '#', [
                                'class' => 'activity-view-link',
                                'title' => '',
                                'data-toggle' => 'modal',
                                'data-target' => '#activity-modal',
                                'data-id' => $key,
                                'data-pjax' => '0',
                    ]).' <i class="glyphicon glyphicon-pencil"></i> รับเคส';
                },
                'headerOptions' => ['class' => 'text-center','style'=>'width:120px;'],
        ], 
            //'hn',
            'name',
            //'givesend:ntext',
            // 'givercare:ntext',                 
            [            
            'attribute' => 'giver',
            'value'=>'person.name',   
            'label' => 'ผู้เยี่ยม',    
            'vAlign' => 'middle',
             ], 
            [            
            'attribute' => 'giver1',              
            'label' => 'นสค.',    
            'vAlign' => 'middle',
             ], 
             //'givertel',
             
            [                
            'class' => 'kartik\grid\BooleanColumn',
            'attribute' => 'rpstok',
            'label' => 'รพ.สต.รับเคส',    
            'vAlign' => 'middle',
            ],  
            // 'datecare',
            // 'createdate',
            // 'updatedate',

            [
                'class' => 'yii\grid\ActionColumn',
                'options'=>['style'=>'width:95px;'],
                'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">{update}</div>',
                'buttons'=>[
//                    'view'=>function($url,$model,$key){
//                        return Html::a('<i class="glyphicon glyphicon-search"></i>',$url,['class'=>'btn btn-default']);
//                    }, 
                    'update'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-pencil"> บันทึกเยี่ยม</i>',['pctclinic/pct-risk-care/update','id'=>$model->id],                                  
                            [                            
                             'class' => 'activity-update-link btn btn-primary',
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
                            $(".modal-title").html("");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-view-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    var $td = $(this).closest("tr").children("td");
                     var sr = $td.eq(1).text();
                    $.get(
                        "?r=pctclinic/pct-risk/rpstupdate",
                        {
                            id: sr
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
                       "?r=pctclinic/pct-risk-care/update",
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