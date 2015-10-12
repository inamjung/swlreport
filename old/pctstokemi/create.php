<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pctstokemi */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Pctstokemis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctstokemi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
