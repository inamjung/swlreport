<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pctlearnrisk */

$this->title = 'Create Pctlearnrisk';
$this->params['breadcrumbs'][] = ['label' => 'Pctlearnrisks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctlearnrisk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
