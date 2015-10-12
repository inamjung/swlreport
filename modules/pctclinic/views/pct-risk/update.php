<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctRisk */

$this->title = 'HN : ' . ' ' . $model->hn. ' ชื่อ-สกุล : ' . $model->name. ' อายุ : ' . $model->age.' ปี';
$this->params['breadcrumbs'][] = ['label' => 'กลุ่มเสี่ยง ส่งผู้ป่วยให้ รพ.สต ลงเยี่ยมบ้าน', 'url' => ['/pctclinic/pct-risk/index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'บันทึกข้อมูล';
?>
<div class="pct-risk-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'moobanlist'=>$moobanlist,
        'initialPreview'=>$initialPreview,
        'initialPreviewConfig'=>$initialPreviewConfig
    ]) ?>

</div>
