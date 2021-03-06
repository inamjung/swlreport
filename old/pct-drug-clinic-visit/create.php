<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PctDrugClinicVisit */

$this->title = 'Create Pct Drug Clinic Visit';
$this->params['breadcrumbs'][] = ['label' => 'Pct Drug Clinic Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-drug-clinic-visit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
