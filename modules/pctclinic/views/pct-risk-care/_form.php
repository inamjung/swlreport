<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
use yii\helpers\Url;
use yii\jui\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\modules\pctclinic\models\PctPerRpst;


/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctRiskCare */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="alert alert-success" role="alert"><h3><?= Html::encode($this->title) ?></h3>
    บันทึกการเยี่ยมบ้านเคสเสี่ยง Stroke & MI 
</div>
<div class="pct-risk-care-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-2">
            <?php                           
                            echo $form->field($model, 'rpstok',['labelOptions'=>['style'=>'color:red;']])->widget(CheckboxX::classname(), [
                                'pluginOptions' => ['threeState' => false],
                            ])->label('รับเคสเยี่ยมบ้าน');
                            ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-10">
            <?= $form->field($model, 'givesend')->label('คำแนะนำการเยี่ยมบ้าน (จาก รพ.แม่ข่าย)')->textarea(['readonly'=>'true','rows' => 6]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-2">            
            <?=$form->field($model,'datecare')->label('วันที่เยี่ยม')->widget(\yii\jui\DatePicker::className(),[  
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,
                     ],
                     
                     'options'=>['class'=>'form-control'
                     ],

                ]);
            ?>
        </div>
         <div class="col-xs-4 col-sm-4 col-md-10">
            <?= $form->field($model, 'givercare')->label('บันทึกคำแนะนำการเยี่ยมที่ให้แก่ผู้ป่วย')->textarea(['rows' => 6]) ?>
        </div>
    </div>         

<div class="row">
        <div class="col-sm-offset-2 col-sm-4">            
            <?=
                $form->field($model, 'giver')->label('เจ้าหน้าที่ลงเยี่ยม')->widget(Select2::className(), ['data' =>
                    ArrayHelper::map(app\modules\pctclinic\models\PctPerRpst::find()->orderBy('id')->all(), 'id', 'name'),
                    'options' => [
                        'placeholder' => 'เจ้าหน้าที่ลงเยี่ยม'],
                    'pluginOptions' =>
                    [        
                        'allowClear' => true
                    ],
                ]);
                ?> 
        </div>
        <div class="col-xs-4 col-sm-4 col-md-6">
            <?= $form->field($model, 'giver1')->label('ระบุ ชื่อ-สกุล / โทรศัพท์ เจ้าหน้าที่ นสค.')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    
<div class="row">
        <div class="col-sm-offset-10 col-sm-2">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-saved"></i> บันทึก' : '<i class="glyphicon glyphicon-saved"></i> บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
