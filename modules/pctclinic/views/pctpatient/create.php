<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\Pctpatient */

$this->title = 'Create Pctpatient';
$this->params['breadcrumbs'][] = ['label' => 'Pctpatients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctpatient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'moobanlist'=>[],
        'initialPreview'=>[],
        'initialPreviewConfig'=>[],
    ]) ?>

</div>
