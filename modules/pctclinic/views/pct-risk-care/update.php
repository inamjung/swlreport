<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctRiskCare */

$this->title = 'CID: ' .''.$model->cid. '  ชื่อ-สกุล :' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pct Risk Cares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pct-risk-care-update">

<!--    <h3><?= Html::encode($this->title) ?></h3>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
