<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctClinicVisit */

$this->title ='' . ' HN: ' . $model->hn.' : '. $model->patientName. ' : อายุ ' . $model->age.' ปี';
$this->params['breadcrumbs'][] = ['label' => 'Pct Clinic Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vn, 'url' => ['view', 'id' => $model->vn]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pct-clinic-visit-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
