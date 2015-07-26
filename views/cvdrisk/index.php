<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;

$this->title = 'CVD-RISK';
$this->params['breadcrumbs'][] = ['label' => 'รายงานNCD', 'url' => ['ncd/index']];
$this->params['breadcrumbs'][]=$this->title;
?>
<div class="well">
 
<h3><span class="label label-info">รายงานหมวดกลุ่มเสี่ยงโรคหลอดเลือดและสมอง CVD-RISK</span></h3>        
<h5>รายงานอยู่ในช่วงกำลังพัฒนา</h5>

</div>
<div class="row">
        <div class="col-xs-4 col-sm-4 col-md-6">
            <?php echo Highcharts::widget([
    'options'=>[        
        'title'=>['text'=>'CVD-RISK คลินิกเบาหวาน แยกเพศ ปีงบ2558'],
        'xAxis'=>[
            'categories'=>$sex
        ],
        'yAxis'=>[
            'title'=>['text'=>'จำนวน(คน)'],
            
        ],
        'series'=>[
            [
                'type'=>'spline',
                'name'=>'Stage1',
                'data'=>$s1,
            ],
            [
                'type'=>'spline',
                'name'=>'Stage2',
                'data'=>$s2,
            ],
            [
                'type'=>'spline',
                'name'=>'Stage3',
                'data'=>$s3,
            ],
            [
                'type'=>'spline',
                'name'=>'Stage4',
                'data'=>$s4,
            ],
            [
                'type'=>'spline',
                'name'=>'Stage5',
                'data'=>$s5,
            ],
            
        ]
    ]
]);?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-6">
            
        </div>
</div>  <p>  


<p>
    <?php
    echo \yii\helpers\Html::a('1) รายชื่อผู้ป่วย กลุ่มโรคเบาหวานที่เสี่ยงต่อ CVD-RISK เฉพาะมีผลคลอเรสเตอรอล (แยกตำบล)', ['cvdrisk/cvdrisk0']);    
    ?>
</p>

    <?php
    echo \yii\helpers\Html::a('2) รายชื่อผู้ป่วย กลุ่มโรคความดันโลหิตสูงที่เสี่ยงต่อ CVD-RISK เฉพาะมีผลคลอเรสเตอรอล (แยกตำบล)', ['cvdrisk/cvdrisk01']);    
    ?>

<!--<p>
    <?php
    echo \yii\helpers\Html::a('3) รายชื่อผู้ป่วยในทะเบียนคลินิกโรคความดันโลหิตสูงที่มีโรคไตวายเรื้อรังร่วม(HT+CKD)_มีผลแลป (แยกตำบล)', ['ht/htckd']);    
    ?>
</p>-->

<div class="footerrow" style="padding-top: 60px">
   
</div>