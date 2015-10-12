<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dpac\models\PctDrugAllVisits */

$this->title = 'Update Pct Drug All Visits: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pct Drug All Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pct-drug-all-visits-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
