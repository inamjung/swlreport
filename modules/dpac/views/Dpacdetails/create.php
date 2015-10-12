<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\dpac\models\Dpacdetails */

$this->title = 'Create Dpacdetails';
$this->params['breadcrumbs'][] = ['label' => 'Dpacdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpacdetails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
