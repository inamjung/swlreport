<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pctpatient */

$this->title = 'แก้ไขข้อมูล: ' .$model->pname. ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pctpatients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pctpatient-update">
<div class="alert alert-danger" role="alert"><h3><?= Html::encode($this->title) ?></h3></div>
    

    <?= $this->render('_form', [
        'model' => $model,
        'moobanlist'=>$moobanlist,
        'initialPreview'=>$initialPreview,
        'initialPreviewConfig'=>$initialPreviewConfig
    ]) ?>

</div>
