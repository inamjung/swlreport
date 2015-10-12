<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pctmooban */

//$this->title = 'Create Pctmooban';
$this->params['breadcrumbs'][] = ['label' => 'Pctmoobans', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctmooban-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
