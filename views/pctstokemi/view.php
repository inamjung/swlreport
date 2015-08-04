<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pctstokemi */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pctstokemis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctstokemi-view">

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
            //'id',
            'cid',
            'hn',
            'pname',
            'name',
            'birthday',
            'age_y',
            'drug',
            'druguse',
            'sex',
            'addrpart',
            'moopart',
            'tmbpart',
            'pdx',
            'admitdate',
            'referdate',
            'hospname_refer',
            'dchdate',
            'typedch',
            'result_black:ntext',
            'sendteam',
           // 'username',
            'appointdate',
            'sign:ntext',
            'status',
//            'note1',
//            'note2',
//            'note3',
//            'createdate',
//            'updatedate',
        ],
    ]) ?>

</div>
