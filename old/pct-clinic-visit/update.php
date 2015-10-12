<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PctClinicVisit */

$this->title = ' ' . 'HN : ' .$model->hn.' - '. $model->patientName.' - อายุ'.$model->age.' ปี '.' / คลินิกโรคประจำตัว :'.$model->hosclinic->name;
$this->params['breadcrumbs'][] = ['label' => 'Pct Clinic Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vn, 'url' => ['view', 'id' => $model->vn]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pct-clinic-visit-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
