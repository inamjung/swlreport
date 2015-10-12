<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hospatient */

$this->title = 'Create Hospatient';
$this->params['breadcrumbs'][] = ['label' => 'Hospatients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospatient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
