<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\pctclinic\models\Uploadpctrisk;
use app\modules\pctclinic\models\PctRiskCare;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;

/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctRisk */

$this->title = 'HN: '.$model->hn.' : '.$model->name.' - อายุ: '.$model->age .' ปี'.' - CID: '.$model->cid;
$this->params['breadcrumbs'][] = ['label' => 'ติดตามผลการเยี่ยม', 'url' => ['indexview']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-risk-view">

    <h4><?= Html::encode($this->title) ?></h4>

<!--    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>-->
    <div class="panel panel-default">
        <div class="panel-body">
           <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->ref,$model->cid)]);?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading"> ข้อมูลส่วนตัว</div>
                <div class="panel-body">
                    <?=
    DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'attributes' => [            
      
            'tel',
            ],
    ]) ?>
                     

                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading"> ข้อมูลการป่วย</div>
                <div class="panel-body">
                            <?=
            DetailView::widget([
                'model' => $model,
                'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                'attributes' => [   
                    [
                        'label'=>'เสี่ยงต่อโรค',
                        'attribute'=>'ptype',                        
                        ],
                    [
                        'label'=>'รพ.สต',
                        'attribute'=>'hospcode',
                        'value'=> $model->hospcodes->name
                        ],
                    [
                        'label'=>'รหัสโรคประจำตัว',
                        'attribute'=>'pdx1',                        
                        ],
                    [
                        'label'=>'ระดับCVDRisk',
                        'attribute'=>'cvd_risk',                        
                        ],
                     [
                        'label'=>'ระดับค่าไต',
                        'attribute'=>'stage',                       
                        ],
                    
                    'pstatus',
                    

                ],
            ]) ?>

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
        'zoom' => 14,
        'width'=>'100%',
        'height'=>'600',
    ]);

    $i=0;
    foreach ($latitude as $C) {
        $coords = new LatLng(['lat'=>$latitude[$i],'lng'=>$longitude[$i]]);
        $marker = new Marker(['position'=>$coords]);

    $marker->attachInfoWindow(
        new InfoWindow([
            'content' => '<h4>'.$name[$i].'<br><i class="glyphicon glyphicon-home"></i> : '.$pdx1[$i].'</h4>'
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
