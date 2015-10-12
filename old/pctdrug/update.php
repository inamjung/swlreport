<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pctdrug */

$this->title = 'แก้ไขข้อมูล: ' . ' ' . $model->drug;
$this->params['breadcrumbs'][] = ['label' => 'Pctdrugs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pctdrug-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
