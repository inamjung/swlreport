<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hospctclinicvisit */

$this->title = 'ชื่อ-สกุล ผู้ป่วย: ' . ' ' . $model->patientName;
$this->params['breadcrumbs'][] = ['label' => 'ส่งเคสลงพื้นที่', 'url' => ['indexhosconfirm']];
$this->params['breadcrumbs'][] = ['label' => $model->hn, 'url' => ['view', 'id' => $model->vn]];
$this->params['breadcrumbs'][] = '';
?>
<div class="hospctclinicvisit-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
