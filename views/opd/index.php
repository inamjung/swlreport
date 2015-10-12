<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['main/index']];
$this->params['breadcrumbs'][]=$this->title;
?>
<div class="well">
    <h3><span class="label label-info">รายงานหมวดกลุ่มงานผู้ป่วยนอก OPD</span></h3>
<h5>รายงานอยู่ในช่วงกำลังพัฒนา</h5>
</div>
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="list-group">
		  <a href="#" class="list-group-item active">
		    Refer In - Refer Out
		  </a>
		  <a href="<?php echo Url::to(['opd/referout-inprov']); ?>" class="list-group-item">1) Refer Out ในจังหวัด</a>
		  <a href="<?php echo Url::to(['opd/referout-outprov-in8']); ?>" class="list-group-item">2) Refer Out นอกจังหวัด-ในเขต8</a>
                  <a href="<?php echo Url::to(['opd/referout-outprov-out8']); ?>" class="list-group-item">3) Refer Out นอกจังหวัด-นอกเขต8</a>
                  <a href="<?php echo Url::to(['opd/referout-center']); ?>" class="list-group-item">4) Refer Out ส่วนกลาง</a>
                  <a href="<?php echo Url::to(['opd/referin-inprov']); ?>" class="list-group-item">5) Refer IN ในจังหวัด</a>
                  <a href="<?php echo Url::to(['opd/referin-outprov-in8']); ?>" class="list-group-item">6) Refer IN นอกจังหวัด-ในเขต8</a>
                  <a href="<?php echo Url::to(['opd/referin-outprov-out8']); ?>" class="list-group-item">7) Refer IN นอกจังหวัด-นอกเขต8</a>
<!--                  <a href="<?php echo Url::to(['opd/referin-center']); ?>" class="list-group-item">8) Refer IN ส่วนกลาง</a>-->
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="list-group">
		  <a href="#" class="list-group-item active">
		    งานบริการ
		  </a>
		  <a href="<?php echo Url::to(['opd/waitnolabx']); ?>" class="list-group-item">1) ระยะเวลารอคอย OPD ในเวลาราชการ ไม่มีLab/Xray</a>
		 
		</div>
	</div>  
</div>


<div class="footerrow" style="padding-top: 60px">
   
</div>

