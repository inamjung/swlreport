<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pctdrug */

$this->title = 'ยา'.' :'.$model->drug;
$this->params['breadcrumbs'][] = ['label' => 'Pctdrugs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctdrug-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('กลับหน้าหลักยา', ['index', 'pctdrug/index'],['class'=>'btn btn-success'] ) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'drug',
            'didcode',
        ],
    ]) ?>

</div>
