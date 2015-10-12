<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\dpac\models\PctAllVisit */

$this->title = 'Create Pct All Visit';
$this->params['breadcrumbs'][] = ['label' => 'Pct All Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-all-visit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
