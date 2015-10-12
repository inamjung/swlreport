<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dpac\models\PctAllVisit */

$this->title = 'Update Pct All Visit: ' . ' ' . $model->vn;
$this->params['breadcrumbs'][] = ['label' => 'Pct All Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vn, 'url' => ['view', 'id' => $model->vn]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pct-all-visit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
