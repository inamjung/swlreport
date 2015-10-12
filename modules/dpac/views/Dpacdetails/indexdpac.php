<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\dpac\models\DpacdetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dpacdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpacdetails-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dpacdetails', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hn',
            'name',
            'cid',
            //'waistline',
            //'weight',
            //'height',
            // 'sugar',
            // 'disease',
            // 'blood',
            // 'bmi',
            // 'ldl',
            // 'cho',
            // 'tg',
            // 'cr',
            // 'ckd',
            // 'kidney',
            // 'akram',
            // 'date',
            // 'cid',
            // 'age',
            // 'gfr_thai',
            // 'gfr_ckd',
            // 'stage',
            // 'cvd_risk',
            // 'hdl',
            // 'tc',
            // 'microalbumin',
            // 'fbs',
            // 'bps',
            // 'bpd',
            'smoke',
            'confirm',
            // 'name',
            // 'bp',
            // 'shoulder',
            // 'armleft',
            // 'armright',
            // 'legleft',
            // 'legright',
            // 'calfleft',
            // 'calfright',
            // 'chest',

            //['class' => 'yii\grid\ActionColumn'],
            [
            'class' => 'yii\grid\ActionColumn',
            'options'=>['style'=>'width:120px;'],
            'buttonOptions'=>['class'=>'btn btn-default'],
            'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
         ],
        ],
    ]); ?>

</div>
