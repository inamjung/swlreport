<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hospatient */

$this->title = 'Update Hospatient: ' . ' ' . $model->hos_guid;
$this->params['breadcrumbs'][] = ['label' => 'Hospatients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hos_guid, 'url' => ['view', 'id' => $model->hos_guid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hospatient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
