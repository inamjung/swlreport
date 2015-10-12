<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HospatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hospatients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospatient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hospatient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hos_guid',
            'hn',
            'pname',
            'fname',
            'lname',
            // 'occupation',
            // 'citizenship',
            // 'birthday',
            // 'addrpart',
            // 'moopart',
            // 'tmbpart',
            // 'amppart',
            // 'chwpart',
            // 'bloodgrp',
            // 'clinic',
            // 'deathday',
            // 'drugallergy',
            // 'familyno',
            // 'fathername',
            // 'firstday',
            // 'hometel',
            // 'informaddr',
            // 'informname',
            // 'informrelation',
            // 'informtel',
            // 'marrystatus',
            // 'mathername',
            // 'hn_int',
            // 'nationality',
            // 'opdlocation',
            // 'pttype',
            // 'religion',
            // 'sex',
            // 'spsname',
            // 'truebirthday',
            // 'workaddr',
            // 'worktel',
            // 'hcode',
            // 'cid',
            // 'hid',
            // 'educate',
            // 'family_status',
            // 'labor_type',
            // 'last_update',
            // 'type_area',
            // 'road',
            // 'father_cid',
            // 'mother_cid',
            // 'couple_cid',
            // 'person_type',
            // 'private_doctor_name',
            // 'legal_action',
            // 'death_code504',
            // 'death_diag',
            // 'node_id',
            // 'admit',
            // 'midname',
            // 'po_code',
            // 'fatherlname',
            // 'motherlname',
            // 'spslname',
            // 'country',
            // 'email:email',
            // 'birthtime',
            // 'mother_hn',
            // 'last_visit',
            // 'death',
            // 'height',
            // 'inregion',
            // 'reg_time',
            // 'oldcode',
            // 'lang',
            // 'gov_chronic_id',
            // 'in_cups',
            // 'patient_type_id',
            // 'addr_soi',
            // 'work_addr',
            // 'father_hn',
            // 'alias_name',
            // 'destroyed',
            // 'old_addr',
            // 'fname_soundex',
            // 'lname_soundex',
            // 'bloodgroup_rh',
            // 'passport_no',
            // 'addressid',
            // 'mobile_phone_number',
            // 'anonymous_person',
            // 'ec_fname',
            // 'ec_lname',
            // 'hospital_department_id',
            // 'membercard_no',
            // 'ec_relation_type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
