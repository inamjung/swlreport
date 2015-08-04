<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pctpatient */

$this->title = $model->pname.''.$model->name.' : '.' โรคประจำตัว :'.$model->ptype;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้ป่วย', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pctpatient-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-edit"></i> แก้ไขข้อมูล', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i> ลบข้อมูล', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ยืนยันการลบข้อมูล?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="glyphicon glyphicon-log-out"></i> หน้าหลัก', ['index', 'pctpatient/index'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel panel-primary">
  <div class="panel-body">
     <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->ref,$model->cid)]);?>
  </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading"><h4><i class="fa fa-phone"></i> ที่อยู่ & การติดต่อ</h4></div>
  <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'attributes' => [
           // 'id',
            'pname',
            'name',
            'sex',
            'age',
            'birthday',
            'cid',
            'addrpart',
            'moo',
            'moopart',
            'address.name',
            //'amppart_id',
           // 'chwpart_id',
            'tel',
            ],
    ]) ?>
      
        </div>
</div>    
    
    <div class="panel panel-primary">
    <div class="panel-heading"><h4><i class="fa fa-hospital-o"></i> ข้อมูลการป่วย</h4></div>
  <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'attributes' => [
            'hospcode',
            'hn',
            'ptype',
            'main_pdx',
            'regdate',
            //'pdx1',
            //'pdx2',
            'drug',            
            'pstatus',
            'status',
           // 'gis',
           // 'latijod',
            //'longtijod',
            //'avatar1',
           // 'username',
           // 'createdate',
           // 'updatedate',
           // 'docs',
            //'covenant',
            //'ref',
        ],
    ]) ?>
  </div>
        </div>
</div>
