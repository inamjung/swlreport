<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;

/* @var $this yii\web\View */
/* @var $model app\models\Pctpatient */

$this->title = $model->pname . '' . $model->name . ' : ' . ' โรคประจำตัว :' . $model->ptype;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้ป่วย', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctpatient-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
<?= Html::a('<i class="glyphicon glyphicon-edit"></i> แก้ไขข้อมูล', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('<i class="glyphicon glyphicon-trash"></i> ลบข้อมูล', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ยืนยันการลบข้อมูล?',
                'method' => 'post',
            ],
        ])
        ?>
        <?= Html::a('<i class="glyphicon glyphicon-log-out"></i> หน้าหลัก', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มผู้ป่วย', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   <div class="panel panel-primary">
        <div class="panel-body">
            <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->ref, $model->cid)]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4><i class="fa fa-phone"></i> ที่อยู่ & การติดต่อ</h4></div>
                <div class="panel-body">
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                        'attributes' => [
                            // 'id',
                            'pname',
                            'name',
                            'sex',
                            'age',
                            'birthday',
                            'cid',
                            'addrpart',
                            'moo',
                            'moopart',
                            [
                                'label'=>'ตำบล',
                                'attribute'=>'address.name',
                            ],
                            
                            //'amppart_id',
                            // 'chwpart_id',
                            'tel',
                        ],
                    ])
                    ?>

                </div>
            </div>  
        </div>
        <div class="col-xs-4 col-sm-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4><i class="fa fa-hospital-o"></i> ข้อมูลการป่วย</h4></div>
                <div class="panel-body">
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                        'attributes' => [
                            [
                                'label'=>'รพ.สต',
                                'attribute'=>'hospcodes.name',
                            ],
                            
                            'hn',
                            'ptype',
                            'main_pdx',
                            'regdate',
                            //'pdx1',
                            //'pdx2',
                            'drug',
                            'pstatus',
                            'status',
                        // 'gis',
                        // 'latitude',
                        //'longitude',
                        //'avatar1',
                        // 'username',
                            'regdate',
                            'createdate',
                            'updatedate',
                        // 'docs',
                        //'covenant',
                        //'ref',
                        ],
                    ])
                    ?>
                </div>
            </div>
        </div>       
    </div>    

<div class="panel panel-primary">
                <div class="panel-heading"><i class="glyphicon glyphicon-road"></i> แผนที่</div>
                <div class="panel-body">
    <?php
    $coord = new LatLng(['lat' => 18.179778, 'lng' => 103.704071]);
    $map = new Map([
        'center' => $coord,
        'zoom' => 10,
        'width'=>'100%',
        'height'=>'800',
    ]);

    $i=0;
    foreach ($latitude as $C) {
        $coords = new LatLng(['lat'=>$latitude[$i],'lng'=>$longitude[$i]]);
        $marker = new Marker(['position'=>$coords]);

    $marker->attachInfoWindow(
        new InfoWindow([
            'content' => '<h4>'.$name[$i].'<br><i class="glyphicon glyphicon-home"></i> : '.$main_pdx[$i].'</h4>'
        ])
    );

        $map->addOverlay($marker);
        $i++;
    }

    echo $map->display();
   ?>
</div>
</div>                
</div>