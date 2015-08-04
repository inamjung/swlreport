<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pctpatient */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้ป่วย', 'url' => ['index']];
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
