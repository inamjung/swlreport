<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hospctclinicvisit */

$this->title = 'Create Hospctclinicvisit';
$this->params['breadcrumbs'][] = ['label' => 'Hospctclinicvisits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospctclinicvisit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
