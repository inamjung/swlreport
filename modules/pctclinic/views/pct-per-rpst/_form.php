<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctPerRpst */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pct-per-rpst-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-3">           
            <?=
                $form->field($model, 'position')->widget(Select2::className(), ['data' =>
                    ArrayHelper::map(\app\modules\pctclinic\models\PctPerpoRpst::find()->orderBy('id')->all(), 'id', 'name'),
                    'options' => [
                        'placeholder' => 'ตำแหน่ง'],
                    'pluginOptions' =>
                    [        
                        'allowClear' => true
                    ],
                ]);
                ?> 
        </div>
         <div class="col-xs-4 col-sm-4 col-md-3">
            
             <?=
                $form->field($model, 'rpst')->widget(Select2::className(), ['data' =>
                    ArrayHelper::map(\app\models\Hospcode::find()->orderBy('tmbpart')->all(), 'hospcode', 'name'),
                    'options' => [
                        'placeholder' => 'รพ.สต.'],
                    'pluginOptions' =>
                    [        
                        'allowClear' => true
                    ],
                ]);
                ?> 
        </div>
        <div class="col-xs-4 col-sm-4 col-md-3">
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        </div> 
        
</div>

    

    

    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
