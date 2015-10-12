<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctRisk */

$this->title = 'HN : ' . ' ' . $model->hn. ' ชื่อ-สกุล : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'รายการเยี่ยมบ้านของ เจ้าหน้าที่ รพ.สต.', 'url' => ['/pctclinic/pct-risk-care/index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'บันทึกข้อมูล';
?>
<div class="pct-risk-rpstupdate">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_rpstupdate', [
        'model' => $model,
        'moobanlist'=>$moobanlist,
        'initialPreview'=>$initialPreview,
        'initialPreviewConfig'=>$initialPreviewConfig
    ]) ?>

</div>
