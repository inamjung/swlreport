<?php

namespace app\modules\dpac\models;

use Yii;

/**
 * This is the model class for table "dpacdetail".
 *
 * @property integer $id
 * @property string $hn
 * @property string $waist
 * @property string $weight
 * @property string $height
 * @property string $sugar
 * @property string $disease
 * @property string $bmi
 * @property string $ldl
 * @property string $cho
 * @property string $tg
 * @property string $cr
 * @property string $ckd
 * @property string $kidney
 * @property string $akram
 * @property string $date
 * @property string $cid
 * @property integer $age
 * @property integer $gfr_thai
 * @property integer $gfr_ckd
 * @property string $stage
 * @property integer $cvd_risk
 * @property string $hdl
 * @property string $tc
 * @property string $microalbumin
 * @property string $fbs
 * @property string $bps
 * @property string $bpd
 * @property string $smoke
 * @property integer $confirm
 * @property string $name
 * @property string $bp
 * @property string $shoulder
 * @property string $armleft
 * @property string $armright
 * @property string $legleft
 * @property string $legright
 * @property string $calfleft
 * @property string $calfright
 * @property string $chest
 * @property string $bloodgrp
 * @property string $birthday
 * @property string $informaddr
 */
class Dpacdetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dpacdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hn'], 'required'],
            [['date'], 'safe'],
            [['age', 'gfr_thai', 'gfr_ckd', 'cvd_risk', 'confirm'], 'integer'],
            [['hn', 'fbs', 'bps', 'bpd'], 'string', 'max' => 10],
            [['waist', 'weight', 'height', 'stage', 'smoke'], 'string', 'max' => 20],
            [['sugar', 'disease', 'bmi', 'ldl', 'cho', 'tg', 'cr', 'ckd', 'kidney', 'akram', 'hdl', 'tc', 'microalbumin', 'bloodgrp', 'informaddr'], 'string', 'max' => 255],
            [['cid'], 'string', 'max' => 18],
            [['name', 'birthday'], 'string', 'max' => 50],
            [['bp', 'shoulder', 'armleft', 'armright', 'legleft', 'legright', 'calfleft', 'calfright', 'chest'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hn' => 'Hn',
            'waist' => 'รอบเอว',
            'weight' => 'น้ำหนัก',
            'height' => 'ส่วนสูง',
            'sugar' => 'Sugar',
            'disease' => 'Disease',
            'blood' => 'หมู่เลือด',
            'bmi' => 'Bmi',
            'ldl' => 'Ldl',
            'cho' => 'Cho',
            'tg' => 'Tg',
            'cr' => 'Cr',
            'ckd' => 'Ckd',
            'kidney' => 'Kidney',
            'akram' => 'Akram',
            'date' => 'Date',
            'cid' => 'เลขบัตรประจำตัวประชาชน',
            'age' => 'อายุ',
            'gfr_thai' => 'Gfr Thai',
            'gfr_ckd' => 'Gfr Ckd',
            'stage' => 'Stage',
            'cvd_risk' => 'Cvd Risk',
            'hdl' => 'Hdl',
            'tc' => 'Tc',
            'microalbumin' => 'Microalbumin',
            'fbs' => 'Fbs',
            'bps' => 'Bps',
            'bpd' => 'Bpd',
            'smoke' => 'ข้อมูลการสูบบุหรี่',
            'confirm' => 'ยืนยันเข้าคลินิก DPAC',
            'name' => 'ชื่อ-สกุล',
            'bp' => 'BP (มม./ปรอท)',
            'shoulder' => 'ไหล่กว้าง',
            'armleft' => 'รอบแขน (ซ้าย)',
            'armright' => 'รอบแขน (ขวา)',
            'legleft' => 'รอบขา (ซ้าย)',
            'legright' => 'รอบขา (ขวา)',
            'calfleft' => 'รอบน่อง (ซ้าย)',
            'calfright' => 'รอบน่อง (ขวา)',
            'chest' => 'รอบอก',
            'bloodgrp' => 'หมู่เลือด',
            'birthday' => 'วันเกิด',
            'informaddr' => 'ที่อยู่',
        ];
    }
}
