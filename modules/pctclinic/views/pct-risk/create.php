<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctRisk */

$this->title = 'Create Pct Risk';
$this->params['breadcrumbs'][] = ['label' => 'Pct Risks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-risk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'moobanlist'=>[],
        'initialPreview'=>[],
        'initialPreviewConfig'=>[]
    ]) ?>

</div>
