<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\dpac\models\PctDrugAllVisits */

$this->title = 'Create Pct Drug All Visits';
$this->params['breadcrumbs'][] = ['label' => 'Pct Drug All Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-drug-all-visits-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
