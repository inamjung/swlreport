
<?php
$this->title = 'HT';
$this->params['breadcrumbs'][] = ['label' => 'รายงานNCD', 'url' => ['ncd/index']];
$this->params['breadcrumbs'][] = ['label' => 'รายงานHT', 'url' => ['ht/index']];
$this->params['breadcrumbs'][]=$this->title;
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="well"> 
<h3><span class="label label-warning">รายงานหมวดโรคความดันโลหิตสูง HT</span></h3>       
<h5>รายงานอยู่ในช่วงกำลังพัฒนา</h5>
</div>

<?php echo Highcharts::widget([
    'options'=>[        
        'title'=>['text'=>'จำนวนผู้ป่วย HT แยกรายตำบล'],
        'xAxis'=>[
            'categories'=>$clinicname
        ],
        'yAxis'=>[
            'title'=>['text'=>'จำนวน(คน)']
        ],
        'series'=>[
            [
                'type'=>'column',
                'name'=>'ต.ศรีวิไล',
                'data'=>$a,
            ],
            [
                'type'=>'column',
                'name'=>'ต.ชุมภูพร',
                'data'=>$b,
            ],
            [
                'type'=>'column',
                'name'=>'ต.นาแสง',
                'data'=>$c,
            ],
            [
                'type'=>'column',
                'name'=>'ต.นาสะแบง',
                'data'=>$d,
            ],
            [
                'type'=>'column',
                'name'=>'ต.นาสิงห์',
                'data'=>$e,
            ],
            
        ]
    ]
]);?>

<p>
    <?php
    echo \yii\helpers\Html::a('1) รายชื่อผู้ป่วยในทะเบียนคลินิกความดันโลหิตสูง HT (แยกตำบล)', ['ht/ht0']);    
    ?>
</p>
<p>
    <?php
    echo \yii\helpers\Html::a('2) รายชื่อผู้ป่วยในทะเบียนคลินิกความดันโลหิตสูง HT_มีผลแลป (แยกตำบล)', ['ht/ht1']);    
    ?>
</p>
<p>
    <?php
    echo \yii\helpers\Html::a('3) รายชื่อผู้ป่วยในทะเบียนคลินิกโรคความดันโลหิตสูงที่มีโรคไตวายเรื้อรังร่วม(HT+CKD)_มีผลแลป (แยกตำบล)', ['ht/htckd']);    
    ?>
</p>

<div class="footerrow" style="padding-top: 60px">
   
</div>




