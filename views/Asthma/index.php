<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use miloschuman\highcharts\Highcharts;

$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['main/index']];
$this->params['breadcrumbs'][]=$this->title;

?>

<div class="panel panel-default">
  <div class="panel-heading"><h4>รายงาน Asthma และ COPD</h4></div>
  <div class="panel-body">
    
    <!-- <p>
                <?php
                echo \yii\helpers\Html::a('1) จำนวนผู้ป่วย Asthma และ COPD ที่refer ', ['asthma/asthma1']);    
                ?>
            </p> 
        

			<p>
                <?php
                echo \yii\helpers\Html::a('2) จำนวนผู้ป่วย Asthma และ COPD ที่พ่นยาห้องฉุกเฉิน ', ['asthma/asthma2']);    
                ?>
            </p> 
            <p>
                <?php
                echo \yii\helpers\Html::a('3) จำนวนผู้ป่วย Asthma และ COPD ที่นอนโรงพยาบาล ', ['asthma/asthma3']);    
                ?>
            </p> -->
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
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6">
		<div class="panel panel-default">
    		<div class="panel-heading">จำนวนผู้ป่วยทั้งหมด - แยกตามคลินิก</div>
    			<div class="panel-body">


        <!-- MAP & BOX PANE -->
       
            <div id="chart1"></div>

            <?php
            $sql = "SELECT count(c.hn) as total ,cc.`name` FROM clinicmember c
                    JOIN clinic cc on cc.clinic=c.clinic
                    WHERE c.clinic_member_status_id in ('3','11') AND c.dchdate is null
                    and cc.clinic in ('015','019')
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
		</div>
	
	
	<div class="col-xs-12 col-sm-12 col-md-6">
		
		<div class="list-group">
		  <a href="#" class="list-group-item active">
		    รายงาน Asthma และ COPD
		  </a>
		  <a href="<?php echo Url::to(['asthma/asthma1']); ?>" class="list-group-item">1) จำนวนผู้ป่วย Asthma และ COPD ที่refer</a>
		  <a href="<?php echo Url::to(['asthma/asthma2']); ?>" class="list-group-item">2) จำนวนผู้ป่วย Asthma และ COPD ที่พ่นยาห้องฉุกเฉิน</a>
		 
		  <a href="<?php echo Url::to(['asthma/asthma3']); ?>" class="list-group-item">2) จำนวนผู้ป่วย Asthma และ COPD ที่นอนโรงพยาบาล</a>
		</div>
	
	</div>

</div>
</div>


<div class="row">
    <!-- Left col -->
    

	
	


  </div>
<div class="footerrow" style="padding-top: 10px">
   
</div>

