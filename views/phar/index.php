<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
use scotthuangzl\googlechart\GoogleChart;

$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['main/index']];
$this->params['breadcrumbs'][]=$this->title;

?>
<div class="well">    
    <h3><span class="label label-success">รายงานหมวดกลุ่มงานเภสัชกรรม PHAR</span></h3>    
    <h5>รายงานอยู่ในช่วงกำลังพัฒนา</h5>

</div>

<div class="row">
        <div class="col-xs-4 col-sm-4 col-md-8">
           <?php
    echo Highcharts::widget([
    'options'=>[ 
        'type'=>'column',
        'title'=>['text'=>'จำนวนรายการยา ใน : ยานอก'],
        'xAxis'=>[
            'categories'=>$total
        ],
        'yAxis'=>[
            'title'=>['text'=>'จำนวน(รายการ)']
        ],
        'series'=>[
            [
                'type'=>'column',
                'name'=>'ยาในบัญชี',
                'data'=>$ed,
            ],
            [
                'type'=>'column',
                'name'=>'ยานอกบัญชี',
                'data'=>$ned,
            ],
            [
                'type'=>'column',
                'name'=>'ยาสมุนไพร',
                'data'=>$edttm,
            ],
        ]
    ]
]);?> 
        </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <?php
echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'responsive' => TRUE,
    'hover' => true,
    'floatHeader' => FALSE,
//    'panel' => [
//        'heading'=>'สัดส่วน',
//        'before' => '',
//        'type' => \kartik\grid\GridView::TYPE_SUCCESS,
//       
//    ],
    'columns'=>[
       
        [
            'label'=>'ED%',
            'attribute'=>'per_ed',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
        [
            'label'=>'NED%',
            'attribute'=>'per_ned',
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-center'],
        ],
      
               ],    
]);

?>
    </div>
    </div>

<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-4">
		<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Antibiotic Smart Use
		  </a>
		  <a href="<?php echo Url::to(['phar/uri']); ?>" class="list-group-item">1) ASU-URI</a>
		  <a href="<?php echo Url::to(['phar/diarrhea']); ?>" class="list-group-item">2) ASU-Diarrhea</a>
                  

		</div>
	</div>
	 <div class="col-xs-6 col-sm-6 col-md-4">
		<div class="list-group">
		  <a href="#" class="list-group-item active">
		    รายงานฝ่ายเภสัชกรรม
		  </a>
		  
                  

		</div>
	</div>
    
    <div class="col-xs-6 col-sm-6 col-md-4">
		<div class="list-group">
		  <a href="#" class="list-group-item active">
		    ปริมาณการใช้ยา
		  </a>
		  
                  

		</div>
	</div>
</div>





<div class="footerrow" style="padding-top: 60px">
   
</div>

