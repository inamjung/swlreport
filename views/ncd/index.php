<?php
/* @var $this yii\web\View */
use miloschuman\highcharts\Highcharts;
use scotthuangzl\googlechart\GoogleChart;
use yii\helpers\Html;
use yii\helpers\Url;
use assets\DashboardAsset;

$this->title = 'รายงานคลินิกโรคไม่ติดต่อเรื้อรัง NCD';
$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['main/index']];


?>
<div class="well">    
    <h3><span class="label label-info">รายงานคลินิกโรคไม่ติดต่อเรื้อรัง NCD</span></h3>
    <h5>รายงานอยู่ในช่วงกำลังพัฒนา</h5>
<?php
    echo Highcharts::widget([
    'options'=>[        
        'title'=>['text'=>'จำนวนผู้ป่วยลงทะเบียนใหม่แต่ละคลินิก รายปี'],
        'xAxis'=>[
            'categories'=>$y
        ],
        'yAxis'=>[
            'title'=>['text'=>'จำนวน(คน)']
        ],
        'series'=>[
            [
                'type'=>'spline',
                'name'=>'DM',
                'data'=>$dm,
            ],
            [
                'type'=>'spline',
                'name'=>'HT',
                'data'=>$ht,
            ],
            [
                'type'=>'spline',
                'name'=>'CKD',
                'data'=>$ckd,
            ],
            [
                'type'=>'spline',
                'name'=>'ASTHMA',
                'data'=>$asthma,
            ],
            [
                'type'=>'spline',
                'name'=>'COPD',
                'data'=>$copd,
            ],
            
        ]
    ]
]);?>
    
</div>

<div class="row">
    <!-- Left col -->
    <div class="col-md-7">
        <!-- MAP & BOX PANE -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h4 class="box-title">จำนวนผู้ป่วยทั้งหมด -แยกตามคลินิก</h4>
                <div class="box-tools pull-right">
                    
                    
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                    <div class="col-md-9 col-sm-4">
                        <div class="pad">
                            <!-- Map will be created here -->
                            <div id="world-map-markers" style="height: 350px;">
                                <div style="display: none">
                                    
        
            </div>
            <div id="chart1"></div>

            <?php
            $sql = "SELECT count(c.hn) as total ,cc.`name` FROM clinicmember c
                    JOIN clinic cc on cc.clinic=c.clinic
                    WHERE c.clinic_member_status_id in ('3','11') AND c.dchdate is null
                    and cc.clinic in ('001','002','024','015','019')
                    GROUP BY c.clinic";
            $rawData = Yii::$app->db2->createCommand($sql)->queryAll();
            $main_data = [];
            foreach ($rawData as $data) {
                $main_data[] = [
                    'name' => $data['name'],
                    'y' => $data['total'] * 1,
                    //'drilldown' => $data['ampurname']
                ];
            }
            $main = json_encode($main_data);?>
            <?php
$this->registerJs("$(function () {

    $('#chart1').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: ''
        },
        xAxis: {
            type: 'category'
        },
        

        legend: {
            enabled: true
        },

        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true
                }
            }
        },

        series: [
        {
            name: 'คลินิก',
            colorByPoint: true,
            data:$main
            
        }
        ],
         
    });
});", yii\web\View::POS_END);
?>
            
                                
                            </div>
                        </div>
                    </div><!-- /.col -->
                    
                </div><!-- /.row -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    

        <!-- TABLE: LATEST ORDERS -->
        <!-- /.box -->
    </div><!-- /.col -->

    <div class="box box-info">
            <div class="box-header with-border">
                <h4 class="box-title">รายงานคลินิกโรคเรื้อรัง</h4>
                <div class="box-tools pull-right">
                    
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="<?php echo Url::to(['ncd/indexdm']); ?>">1) หมวดรายงานกลุ่มโรค -เบาหวาน</a></td>
                               <td></td>
                                <td><span class="label label-success">DM</span></td>                                
                            </tr>
                            <tr>
                                <td><a href="<?php echo Url::to(['ht/index']); ?>">2) หมวดรายงานกลุ่มโรค -ความดันโลหิตสูง</a></td>
                                <td></td>
                                <td><span class="label label-warning">HT</span></td> 
                                
                            </tr>
                            <tr>
                                <td><a href="<?php echo Url::to(['ckd/index']); ?>">3) หมวดรายงานกลุ่มโรค -ไตวายเรื้อรัง</a></td>
                                <td></td>
                                <td><span class="label label-danger">CKD</span></td>
                                
                            </tr>
                            <tr>
                                <td><a href="<?php echo Url::to(['cvdrisk/index']); ?>">4) หมวดรายงาน -กลุ่มเสี่ยงโรคหลอดเลือดและสมอง</a></td>
                                <td></td>
                                <td><span class="label label-info">CVD-RISK</span></td>
                                
                            </tr>
                            
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->
            </div><!-- /.box-body -->
            
        </div><!-- /.col -->
</div>

<div class="footerrow" style="padding-top: 60px">
   
</div>

