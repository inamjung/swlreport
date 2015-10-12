<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PctDrugClinicVisit */

$this->title = 'Update Pct Drug Clinic Visit: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pct Drug Clinic Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pct-drug-clinic-visit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
