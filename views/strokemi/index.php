<?php
$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['main/index']];
$this->params['breadcrumbs'][]=$this->title;

$this->title = 'HOSxP Report
';

use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="well"> 
<h3><span class="label label-warning"> ผู้ป่วย Stroke & MI</span></h3>       
<h5>รายงานอยู่ในช่วงกำลังพัฒนา</h5>
</div>
<p>
    <?php
    echo \yii\helpers\Html::a('1) รายชื่อผู้ป่วยหลอดเลือดและสมอง-stroke', ['strokemi/strokedx']);    
    ?>
</p>
<p>
    <?php
    echo \yii\helpers\Html::a('2) รายชื่อผู้ป่วยหลอดเลือดและหัวใจ-mi', ['strokemi/midx']);    
    ?>
</p>