<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pctpatientrisk */

$this->title = 'Create Pctpatientrisk';
$this->params['breadcrumbs'][] = ['label' => 'Pctpatientrisks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctpatientrisk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
