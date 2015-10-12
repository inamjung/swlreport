<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pctpatientrisk */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pctpatientrisks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctpatientrisk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hn',
            'pname',
            'name',
            'sex',
            'age',
            'birthday',
            'cid',
            'addrpart',
            'moo',
            'moopart',
            'tmbpart_id',
            'amppart_id',
            'chwpart_id',
            'tel',
            'hospcode',
            'main_pdx',
            'pdx1',
            'gis',
            'latitude',
            'longitude',
            'avatar1',
            'createdate',
            'updatedate',
            'docs',
            'covenant',
            'ref',
            'status',
            'username',
            'drug',
            'regdate',
            'pstatus',
            'ptype',
            'confirmin',
            'cvd_risk',
            'stage',
            'sendrpst',
            'rpstok',
        ],
    ]) ?>

</div>
