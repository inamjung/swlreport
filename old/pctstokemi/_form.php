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
use yii\helpers\Url;
use kartik\widgets\DepDrop;

use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\models\Pctpatient;
/* @var $this yii\web\View */
/* @var $model app\models\Pctstokemi */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="pctstokemi-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="well">
    
    <div class="row">
        <div class="col-sm-offset-2 col-sm-4">
             <?=
            $form->field($model, 'cid')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(app\models\Pctpatient::find()->all(), 'cid', 'cid'),
                        'options' => [
                        'placeholder' => '<--ค้นหาตาม CID-->','id'=>'ptName'],                        
                        'pluginOptions' =>
                        [
                            'allowClear' => true
                        ],
                    ]);
            ?>            
        </div>
         <div class="col-xs-3 col-sm-3 col-md-3"> 
            <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'status')->textInput() ?>
        </div>
    </div>
    <hr>
     <div class="row">       
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'pname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
             <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'age_y')->textInput(['maxlength' => true]) ?>
            
        </div>
         <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'sex')->textInput() ?>
        </div>
    </div>
    <div class="row">        
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'addrpart')->textInput(['maxlength' => true]) ?>
        </div>        
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'moopart')->textInput(['maxlength' => true]) ?>
        </div>            
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'tmbpart')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3"> 
            <?= $form->field($model, 'main_pdx')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
</div>        
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'pdx')->textInput(['maxlength' => true]) ?>
        </div>    
        <div class="col-xs-3 col-sm-3 col-md-9">
            <?= $form->field($model, 'sign')->textarea(['rows' => 4]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'admitdate')->textInput() ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'dchdate')->textInput() ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'typedch')->textInput() ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'appointdate')->textInput() ?>
        </div>        
    </div>
    <div class="row">        
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'referdate')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'hospname_refer')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'referbackdate')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'typedchreferback')->textInput() ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-9">
            <?= $form->field($model, 'result_black')->textarea(['rows' => 4]) ?>
        </div>
    </div>    
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-5">
            <?= $form->field($model, 'drug')->textInput() ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-7">
            <?= $form->field($model, 'druguse')->textInput(['maxlength' => true]) ?>
        </div> 
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-5">
            <?= $form->field($model, 'sendteam')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-7">
            <?= $form->field($model, 'note1')->textInput(['maxlength' => true]) ?>
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
        $('#ptName').change(function(){
            var ptnameID = $(this).val();
           
            $.get('index.php?r=pctpatient/get-pt-name',{ ptnameID : ptnameID }, function(data){
        
                    var data = $.parseJSON(data); 
                      
                    $('#pctstokemi-hn').attr('value',data.hn);
                    $('#pctstokemi-name').attr('value',data.name);
                    $('#pctstokemi-pname').attr('value',data.pname);
                    $('#pctstokemi-pdx').attr('value',data.pdx);
                    $('#pctstokemi-addrpart').attr('value',data.addrpart);
                    $('#pctstokemi-moopart').attr('value',data.moopart);
                    $('#pctstokemi-tmbpart').attr('value',data.tmbpart_id);
                    $('#pctstokemi-main_pdx').attr('value',data.main_pdx);
                    $('#pctstokemi-sex').attr('value',data.sex);
                    $('#pctstokemi-status').attr('value',data.status);
                    $('#pctstokemi-birthday').attr('value',data.birthday);
                });
        });
JS;
$this->registerJs($script);
?>    

<?php

function get_age($birth_date){
 return floor((time() - strtotime($birth_date))/31556926);
 }

echo " I am ".get_age("2001-05-10") ." years old";
// echo get_age;

?>