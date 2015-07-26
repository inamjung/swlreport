
<?php
$this->title = 'CKD';
$this->params['breadcrumbs'][] = ['label' => 'รายงาน NCD', 'url' => ['ncd/index']];
$this->params['breadcrumbs'][] = ['label' => 'รายงาน CKD', 'url' => ['ckd/index']];
$this->params['breadcrumbs'][]=$this->title;
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['main/index']];
$this->params['breadcrumbs'][]=$this->title;
?>
<div class="well">    
<h3><span class="label label-danger">รายงานหมวดโรคไตวายเรื้อรัง CKD</span></h3>
<h5>รายงานอยู่ในช่วงกำลังพัฒนา</h5>
</div>

<?php echo Highcharts::widget([
    'options'=>[        
        'title'=>['text'=>'จำนวนผู้ป่วย CKD แยกรายตำบล'],
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
    echo \yii\helpers\Html::a('1) รายชื่อผู้ป่วยในทะเบียนคลินิกโรคไตวายเรื้อรัง_CKD (แยกตำบล)', ['ckd/ckd0']);    
    ?>
</p>
<p>
    <?php
    echo \yii\helpers\Html::a('2) รายชื่อผู้ป่วยในทะเบียนคลินิกโรคไตวายเรื้อรัง_CKD มีผลแลป (แยกตำบล)', ['ckd/ckd1']);    
    ?>
</p>
<p>
    <?php
    echo \yii\helpers\Html::a('3) รายชื่อผู้ป่วยในทะเบียนคลินิกโรคไตวายเรื้อรังที่มีโรคความดันโลหิตสูงร่วม_(CKD+HT)มีผลแลป (แยกตำบล)', ['ckd/ckdht']);    
    ?>
</p>
<p>
    <?php
    echo \yii\helpers\Html::a('4) รายชื่อผู้ป่วยในทะเบียนคลินิกโรคไตวายเรื้อรังที่มีโรคความดันโลหิตสูงและเบาหวานร่วม_(CKD+HT+DM)มีผลแลป (แยกตำบล)', ['ckd/ckdhtdm']);    
    ?>
</p>
<div class="footerrow" style="padding-top: 60px">
   
</div>




