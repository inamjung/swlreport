<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctRiskCare */

$this->title = 'Create Pct Risk Care';
$this->params['breadcrumbs'][] = ['label' => 'Pct Risk Cares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-risk-care-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
