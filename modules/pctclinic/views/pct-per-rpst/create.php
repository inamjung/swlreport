<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\pctclinic\models\PctPerRpst */

$this->title = 'เจ้าหน้าที่ รพ.สต';
$this->params['breadcrumbs'][] = ['label' => 'Pct Per Rpsts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pct-per-rpst-create">

    <div class="alert alert-success" role="alert"><h3><?= Html::encode($this->title) ?></h3>เพิ่มเจ้าหน้าที่ รพ.สต</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
