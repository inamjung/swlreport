<?php
/* @var $this yii\web\View */

$this->title = 'HOSxP Report
';

use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="site-index">
    <div class="well">
    <div class="jumbotron">
        <h2>ระบบรายงาน HOSxP โรงพยาบาลศรีวิไล</h2>
        <hr>
        
    </div>
<div class="body-content">
       <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?php echo Highcharts::widget([
    'options'=>[        
        'title'=>['text'=>'จำนวนรายงานที่มีในระบบ'],
        'xAxis'=>[
            'categories'=>[
                'NCD','PHAR','OPD','ER','IPD','ASTHMA/COPD'
            ]
        ],
        'yAxis'=>[
            'title'=>['text'=>'จำนวน(รายงาน)']
        ],
        'series' => [
         ['type'=>'column','name' => 'หมวดรายงาน', 'data' => [25,3,7,2,5,3]],
        
         ['type'=>'spline','color'=>'red','name' => 'หมวดรายงาน', 'data' => [25,3,7,2,5,3]],   
            
      ]
   ]
]);?>
        </div>
    <div class="col-xs-4 col-sm-4 col-md-3">
               
        <div class="box box-info">
            <div class="box-header with-border">
                <h4 class="box-title">รายงาน- แยกตามหมวด</h4>
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
                                <td><a href="<?php echo Url::to(['ncd/index']); ?>">1) หมวด- รายงานคลินิกโรคเรื้อรัง</a></td>
                               <td></td>
                                <td><span class="label label-success">NCD</span></td>                                
                            </tr>
                            <tr>
                                <td><a href="<?php echo Url::to(['phar/index']); ?>">2) หมวด- รายงานระบบยา </a></td>
                                <td></td>
                                <td><span class="label label-warning">PHAR</span></td> 
                                
                            </tr>
                            <tr>
                                <td><a href="<?php echo Url::to(['opd/index']); ?>">3) หมวด- ระบบงานผู้ป่วยนอก</a></td>
                                <td></td>
                                <td><span class="label label-danger">OPD</span></td>
                                
                            </tr>
                            <tr>
                                <td><a href="<?php echo Url::to(['er/index']); ?>">4) หมวด- อุบัติเหตุฉุกเฉิน</a></td>
                                <td></td>
                                <td><span class="label label-info">ER</span></td>
                                
                            </tr>
                            <tr>
                                <td><a href="<?php echo Url::to(['strokemi/index']); ?>">5) หมวด -หลอดเลือดสมอง/หัวใจ</a></td>
                                <td></td>
                                <td><span class="label label-info">Stroke & Mi</span></td>
                                
                            </tr>
                            
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->
            </div><!-- /.box-body -->
            
        </div><!-- /.col -->
        
   
            </div>
           <div class="col-xs-4 col-sm-4 col-md-5">
               <div class="box box-info">
            <div class="box-header with-border">
                <h4 class="box-title">รายงาน-แยกตามหมวด</h4>
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
                                <td><a href="<?php echo Url::to(['ipd/index']); ?>">5) หมวด- รายงานระบบงานผู้ป่วยใน</a></td>
                               <td></td>
                                <td><span class="label label-success">IPD</span></td>                                
                            </tr>
                            <tr>
                                <td><a href="<?php echo Url::to(['asthma/index']); ?>">6) หมวด -รายงานASTHMA/COPD</a></td>
                                <td></td>
                                <td><span class="label label-warning">ASTHMA/COPD</span></td> 
                                
                            </tr>
                            <tr>
                                <td><a href="<?php echo Url::to(['ttm/index']); ?>">7) หมวด -รายงานแผนไทย+กายภาพ</a></td>
                                <td></td>
                                <td><span class="label label-danger">TTM</span></td>
                                
                            </tr>
                            <tr>
                                <td><a href="<?php echo Url::to(['dent/index']); ?>">8) หมวด -รายงานทันตกรรม</a></td>
                                <td></td>
                                <td><span class="label label-info">DENTAL</span></td>
                                
                            </tr>
                            
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->
            </div><!-- /.box-body -->
            
        </div><!-- /.col -->
               
           </div>   
        </div>

    </div>
        <div><a class="btn btn-lg btn-warning" href="http://118.175.15.30/swlgroup/web"> ไปที่ Swlgroup </a>
            <a class="btn btn-lg btn-warning" href="http://www.sriwilaihos.go.th/">หรือ ไปที่ Sriwilaihos </a>
        </div>
</div>
</div>

<?php
$js = <<< JS
        
     //alert('ddd');  
        
JS;

$this->registerJs($js);

?>