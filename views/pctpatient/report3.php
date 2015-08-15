<?php
 $this->title = 'ตำแหน่งบ้าน';
 $this->params['breadcrumbs'][] = $this->title;
 
 use yii\helpers\Html;
 use yii\widgets\DetailView;
 use dosamigos\google\maps\LatLng;
 use dosamigos\google\maps\overlays\InfoWindow;
 use dosamigos\google\maps\overlays\Marker;
 use dosamigos\google\maps\Map;
 use kartik\grid\GridView;
 
 ?>
<div class="pctpatient-report3">
 <div class="panel panel-primary">
        
    </div>

    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-phone"></i> ที่อยู่ & การติดต่อ</div>
                <div class="panel-body">
                    <?php
         echo GridView::widget([
         	'dataProvider'=>$dataProvider,
         	'panel'=>[
        // 		'heading'=>'<h3 class="penel-tille"><i class="glyphicon glyphicon-globe"></i> สรุปข้อมูลผู้ป่วยใน</h3>',
        // 		'type'=>'success',
        //         'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> โหลดข้อมูลใหม่', ['/report/report/report2'], ['class' => 'btn btn-info']),
        //         'footer' => false
         	],
         	'responsive'=>true,
             'hover' => true,
             'pjax' => true,
             'pjaxSettings' => [
                 'neverTimeout' => true,
                 'beforeGrid' => '',
                 'afterGrid' => '',
             ],
             'columns' => [
                 //['class'=>'yii\grid\SerialColumn'],
                 [
                     'label' => 'ปี',
                     'attribute' => 'name'
                 ],
                 [
                     'label' => 'เดือน',
                     'attribute' => 'main_pdx'
                 ],
                
  
             ],
         ]);
        ?>
                </div>
            </div>
        </div>    
        <div class="col-xs-4 col-sm-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-phone"></i> โรค</div>
                <div class="panel-body">
                    
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
     'zoom' => 9,
     'width'=>'100%',
     'height'=>'300',
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