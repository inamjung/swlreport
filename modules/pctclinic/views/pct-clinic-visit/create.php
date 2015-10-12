<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctClinicVisit */

$this->title = 'Create Pct Clinic Visit';
$this->params['breadcrumbs'][] = ['label' => 'Pct Clinic Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-clinic-visit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
