<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pctdrug */

//$this->title = 'Create Pctdrug';
$this->params['breadcrumbs'][] = ['label' => 'Pctdrugs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctdrug-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
