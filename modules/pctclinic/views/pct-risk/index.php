<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\modules\pctclinic\models\Pctaddress;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\modules\pctclinic\models\PctRiskCare;
use app\modules\pctclinic\models\PctRisk;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\pctclinic\models\PctRiskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'กลุ่มเสี่ยง ส่งผู้ป่วยให้ รพ.สต ลงเยี่ยมบ้าน';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pct-risk-index">
    <div class="alert alert-danger" role="alert"><h3><?= Html::encode($this->title) ?></h3>
        กลุ่มเสี่ยงที่อยู่ในระบบ </div>

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?= Html::a('Create Pct Risk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <table class="table">
        
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            // 'id',
            //'cid',
//            [
//                'attribute' => 'hn',
//                'label' => 'HN',
//                'headerOptions' => ['class' => 'text-center','style'=>'width: 100px;'],
//                'contentOptions' => ['class' => 'text-left']
//            ],
            [
                'attribute' => 'name',
                'label' => 'ชื่อ-สกุล',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-left']
            ],
//            [
//                'attribute' => 'age',
//                'label' => 'อายุ',
//                'headerOptions' => ['class' => 'text-center','style'=>'width: 50px;'],
//                'contentOptions' => ['class' => 'text-center']
//            ],
            [
                'attribute' => 'pdx1',
                'label' => 'รหัสโรค',
                'headerOptions' => ['class' => 'text-center','style'=>'width: 80px;'],
                'contentOptions' => ['class' => 'text-center']
            ],
            [
                'attribute' => 'addrpart',
                'label' => 'บ้านเลขที่',
                'value' => function($model) {
                    return $model->addrpart . 'หมู่ที่ ' . $model->moo;
                },
                'contentOptions' => ['style' => 'width: 110px;']
            ],
            [
                'attribute' => 'moopart',
                'value' => 'moopart',
                'filter' => ArrayHelper::map(app\modules\pctclinic\models\Pctmooban::find()->orderBy('mooban')->asArray()->all(), 'mooban', 'mooban'),
                'vAlign' => 'middle',
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                //'format'=>'raw'    
                ],
                'headerOptions' => ['class' => 'text-center','style'=>'width: 130px;'],
                'contentOptions' => ['class' => 'text-center'],
                'filterInputOptions' => ['placeholder' => 'หมู่บ้าน'],
            ],
            [
                'attribute' => 'tmbpart_id',
                'value' => 'address.name',
                'filter' => ArrayHelper::map(Pctaddress::find()->orderBy('tmbpart')->asArray()->all(), 'name', 'name'),
                'vAlign' => 'middle',
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                //'format'=>'raw'    
                ],
                'headerOptions' => ['class' => 'text-center','style'=>'width: 120px;'],
                'contentOptions' => ['class' => 'text-center'],
                'filterInputOptions' => ['placeholder' => 'ตำบล'],
            ],
            // 'amppart_id',
            // 'chwpart_id',
            // 'tel',
            [
                'attribute' => 'hospcode',
                'value' => 'hospcodes.name',
                'label' => 'รพ.สต.',
                'filter' => ArrayHelper::map(app\models\Pcthospcode::find()->orderBy('tmbpart')->asArray()->all(), 'name', 'name'),
                'vAlign' => 'middle',
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                //'format'=>'raw'    
                ],
                'headerOptions' => ['class' => 'text-center','style'=>'width: 120px;'],
                'contentOptions' => ['class' => 'text-center'],
                'filterInputOptions' => ['placeholder' => 'รพ.สต'],
            ],
            [
                'attribute' => 'ptype',
                'label' => 'เสี่ยง',
                'filter' => app\modules\pctclinic\models\PctRisk::$ptypes,
                'value' => function($data) {
                    return app\modules\pctclinic\models\PctRisk::$ptypes[$data->ptype];
                },
                'headerOptions' => ['class' => 'text-center','style'=>'width: 80px;'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'label' => 'สถานะ',
                'attribute' => 'pstatus',                
                'filter' => app\modules\pctclinic\models\PctRisk::$pstatuses,
                'value' => function($data) {
                return app\modules\pctclinic\models\PctRisk::$pstatuses[$data->pstatus];
                  },
                'headerOptions' => ['class' => 'text-center','style'=>'width: 100px;'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                
            'class' => 'kartik\grid\BooleanColumn',
            'attribute' => 'confirmin',
            'label' => 'ส่งเคส',    
            'vAlign' => 'middle',
        ],      
                             
            // 'main_pdx',            
            // 'cvd_risk',
            // 'stage',
            // 'gis',
            // 'latitude',
            // 'longitude',
            // 'avatar1',
            // 'docs',
            // 'covenant',
            // 'ref',
            // 'drug',
            // 'regdate',
            // 'pstatus',
            // 'ptype',
            // 'confirmin',
            // 'sendrpst',
            // 'rpstok',
            // 'username',
            // 'createdate',
            // 'updatedate',
             [
                'class' => 'yii\grid\ActionColumn',
                'options'=>['style'=>'width:50px;'],
                'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">{update}</div>',
                'buttons'=>[
//                    'view'=>function($url,$model,$key){
//                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',$url,['class'=>'btn btn-default']);
//                    }, 
//                    'update'=>function($url,$model,$key){
//                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>',['update','id'=>$model->id],['class'=>'btn btn-success']);
//                    },
//                    
                    'update'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>',['pctclinic/pct-risk/update','id'=>$model->id],                                  
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
            
            //[
            //'class' => 'yii\grid\ActionColumn'
            //],
        ],
    ]); ?>
    

    </table>  
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
                        "?r=pctclinic/pct-risk/indivcare",
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
                       "?r=pctclinic/pct-risk/update",
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