<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\PctHospcode;
use kartik\widgets\FileInput;
//use yii\widgets\Pjax;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\widgets\DepDrop;
use app\modules\pctclinic\models\Patient;
use kartik\checkbox\CheckboxX;
use app\modules\pctclinic\models\Uploadpctrisk;

/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\Pctpatient */
/* @var $form yii\widgets\ActiveForm */
?>


    <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading"> ข้อมูลส่วนตัว</div>
                <div class="panel-body">
                            <?=
            DetailView::widget([
                'model' => $model,
                'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                'attributes' => [   
                    [
                        'label'=>'ที่อยู่',                        
                        'value'=> $model->addrpart.' หมู่ '.$model->moo.' บ้าน '.$model->moopart.'  ต. '.$model->address1->name 
                        ],
                    [
                        'label'=>'บัตรประชาชน',
                        'attribute'=> 'cid',                       
                        ],                   
                        'tel', 
                ],
            ]) ?>

                </div>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="panel panel-warning">
                <div class="panel-heading"> ข้อมูลการป่วย</div>
                <div class="panel-body">
                            <?=
            DetailView::widget([
                'model' => $model,
                'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                'attributes' => [   
                    [
                        'label'=>'เสี่ยงต่อโรค',
                        'attribute'=>'ptype',                        
                        ],                    
                    [
                        'label'=>'รหัสโรคประจำตัว',
                        'attribute'=>'pdx1',                        
                        ],
                    [
                        'label'=>'ระดับCVDRisk',
                        'attribute'=>'cvd_risk',                        
                        ],
                    [
                        'label'=>'ค่าไต',
                        'attribute'=>'gfr_ckd',                       
                        ],  
                     [
                        'label'=>'ระดับค่าไต',
                        'attribute'=>'stage',                       
                        ], 
                ],
            ]) ?>

                </div>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="panel panel-warning">
                <div class="panel-heading"> ข้อมูลการป่วย</div>
                <div class="panel-body">
                            <?=
            DetailView::widget([
                'model' => $model,
                'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                'attributes' => [   
                    [
                        'label'=>'ความดัน',
                        'value'=> $model->bps.' / '.$model->bpd
                        ],                    
                    [
                        'label'=>'ค่าน้ำตาลในเลือด',
                        'attribute'=>'pdx1',                        
                        ],
                    [
                        'label'=>'ยาASA',
                        'attribute'=>'dasa',                        
                        ],
                    [
                        'label'=>'ยาSK',
                        'attribute'=>'dsk',                        
                        ],
                     [
                        'label'=>'BMI',
                        'attribute'=>'bmi',                       
                        ],                    
                   
                    

                ],
            ]) ?>

                </div>
            </div>
        </div>
        </div>
<div class="pct-risk-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="panel panel-info">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-log-in"></i> บันทึกข้อมูลผู้ป่วยเสี่ยง Stroke & Mi เพื่อส่งไป รพ.สต</h4></div>
    <div class="panel-body">
        
        
    <div class="row">
        <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 50])->label(false); ?>

<!--        <div class="col-sm-offset-1 col-sm-3">
            <?= $form->field($model, 'name')->textInput(['readonly'=>'true','maxlength' => true]) ?>
        </div>
              
            <div class="col-xs-3 col-sm-3 col-md-1">
             <?= $form->field($model, 'age')->textInput(['readonly'=>'true','maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2">            
            <?= $form->field($model, 'tel')->widget(\yii\widgets\MaskedInput::classname(), [               
             'mask' => '99-9999-9999',
                'options'=>['disabled'=>true,
                 'class'=>'form-control'
                    ],
                ]) ?>  
        </div>         
            <div class="col-xs-3 col-sm-3 col-md-2"> 
            <?= $form->field($model, 'cid')->label('เลขบัตร ปชช.')->widget(\yii\widgets\MaskedInput::classname(), [
             'mask' => '9-9999-99999-99-9',
                'options'=>['disabled'=>true,
                 'class'=>'form-control'
                    ],
                ]) ?> 
        </div> 
         
        <div class="col-xs-3 col-sm-3 col-md-2">    
            <?= $form->field($model, 'addrpart')->label('บ้านเลขที่')->textInput(['readonly'=>'true','maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-1"> 
            <?= $form->field($model, 'moo')->label('หมู่')->textInput(['readonly'=>'true','maxlength' => true]) ?>
        </div>
</div>
    <div class="row"> 
        
            <div class="col-sm-offset-1 col-sm-2">
            <?=
            $form->field($model, 'tmbpart_id')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(app\modules\pctclinic\models\Pctaddress::find()->all(), 'tmbpart', 'name'),
                        'options' => [
                            
                        'placeholder' => '<--ตำบล-->'],                        
                        'pluginOptions' =>
                        [
                           // 'disabled'=>true,
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div> 
            <div class="col-xs-3 col-sm-3 col-md-3">  
            <?=
            $form->field($model, 'moopart')->widget(DepDrop::className(), [
                    'data' => $moobanlist,
                    'options' => ['placeholder' => '<--หมู่บ้าน-->'],
                    'type' => DepDrop::TYPE_SELECT2,
                    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                    'pluginOptions' => [
                        'depends' => ['pct-risk-tmbpart_id'],            
                        'url' => yii\helpers\Url::to(['/pctclinic/pct-risk/get-mooban']),
                        'loadingText' => 'กำลังค้นหา...',
                    ],
                ]);
            ?>
        </div> 

        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>
        </div>
       
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>
        </div>
    </div>-->
        
      
    <div class="row">
</div>

<div class="row"> 
    
    <div class="col-sm-offset-1 col-sm-2">        
            <?php                           
                            echo $form->field($model, 'confirmin',['labelOptions'=>['style'=>'color:red;']])->widget(CheckboxX::classname(), [
                                'pluginOptions' => ['threeState' => false],
                            ])->label('ยืนยันส่งเยี่ยมบ้าน');
                            ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-8">
             <?= $form->field($model, 'givesend')->textarea(['rows'=>'4','maxlength' => true]) ?>
        </div>
</div>
    <div class="row">
        
        <div class="col-xs-3 col-sm-3 col-md-4">                
            <?=
            $form->field($model, 'main_pdx')->label('ระบุชื่อโรคที่ผู้ป่วยเสี่ยง')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(app\modules\pctclinic\models\Pctdisease::find()->all(), 'code',
                        function($model,$defaultValue){
                                return $model->code.'-'.$model->name;
                        }),                               
                        'options' => [                            
                        'placeholder' => '<--รหัสโรค-->'],                        
                        'pluginOptions' =>
                        [
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div>
       <div class="col-xs-3 col-sm-3 col-md-2">          
            <?=
            $form->field($model, 'hospcode')->label('หน่วยบริการ')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(app\models\PctHospcode::find()->all(), 'hospcode', 'name'),
                        'options' => [
                        'placeholder' => '<--รพ.สต-->'],                        
                        'pluginOptions' =>
                        [
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-6"> 
         <?= $form->field($model, 'pstatus')->label('สถานะการรักษา')->inline()->radioList(app\modules\pctclinic\models\PctRisk::itemAlias('pstatus')) ?>   
        </div>
<!--        <div class="col-xs-3 col-sm-3 col-md-2">
            <?= $form->field($model, 'pdx1')->textInput(['maxlength' => true]) ?>
        </div>-->
    </div>
<!--        <div class="col-xs-3 col-sm-3 col-md-4"> 
            <?php //echo
            //$form->field($model, 'drug',['labelOptions'=>['style'=>'color:blue;']])->label('ยาที่ใช้')->widget(Select2::className(), ['data' => 
             //           ArrayHelper::map(app\models\Pctdrug::find()->all(), 'drug', 'drug'),
//                        'options' => [
//                        'placeholder' => '<--ยาที่ใช้-->'],                        
//                        'pluginOptions' =>
//                        [
//                            'allowClear' => true
//                        ],
//                    ]);
//            ?>
        </div>-->
    </div>
         <div class="row">             
<!--        <div class="col-sm-offset-1 col-sm-4">
             <?= $form->field($model, 'ptype')->label('โรคประจำตัว')->inline()->radioList(app\modules\pctclinic\models\PctRisk::itemAlias('ptype')) ?>
        </div>-->
                 
    </div> 
            
<!--     โค้ดรูป -->


</div> 
</div>    


    
    <div class="form-group">
            <div class="col-sm-offset-2 col-sm-9">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', 
            ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$script = <<< JS
        $('#hnName').change(function(){
            var nameID = $(this).val();
            
            $.get('index.php?r=hospatient/get-name-patient',{nameID : nameID},function(data){
                var data = $.parseJSON(data);
                $('#pctpatient-fname').attr('value',data.name);
                });
            });
JS;
$this->registerJs($script);
?>