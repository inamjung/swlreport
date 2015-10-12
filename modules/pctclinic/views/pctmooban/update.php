<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\Pctmooban */

$this->title = 'Update Pctmooban: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pctmoobans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pctmooban-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
