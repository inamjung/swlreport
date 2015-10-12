<?php

namespace app\modules\dpac\models;

use Yii;

/**
 * This is the model class for table "pct_all_visit".
 *
 * @property string $vn
 * @property string $vstdate
 * @property string $hn
 * @property string $clinic
 * @property string $icd10
 * @property string $cr
 * @property string $gfr_thai
 * @property string $gfr_ckd
 * @property string $stage
 * @property string $message_gfr
 * @property string $cvd_risk
 * @property string $urine_protein
 * @property string $hdl
 * @property string $ldl
 * @property string $cholesterol
 * @property string $triglyceride
 * @property string $hba1c
 * @property string $microalbumin
 * @property string $fbs
 * @property string $bps
 * @property string $bpd
 * @property string $smoke
 * @property string $lat
 * @property string $lng
 * @property integer $hosconfirm
 * @property integer $ssoconfirm
 * @property string $sendto
 * @property string $createdate
 * @property string $updatedate
 * @property integer $age
 * @property string $bmi
 * @property string $next_app_date
 */
class PctAllVisit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
public  function getPatientName()
    {
        return $this->patient->pname.$this->patient->fname.' '.$this->patient->lname;

    }

    public function getCID()
    {
        return $this->patient->cid;
    }
     public function getBloodgrp()
    {
        return $this->patient->bloodgrp;
    }
    public function getInformaddr()
    {
        return $this->patient->informaddr;
    }
    public function getBirthday()
    {
        return $this->patient->birthday;
    }
    
    public static function tableName()
    {
        return 'pct_all_visit';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vn'], 'required'],
            [['vstdate', 'createdate', 'updatedate', 'next_app_date'], 'safe'],
            [['hosconfirm', 'ssoconfirm', 'age'], 'integer'],
            [['vn', 'cr', 'gfr_thai', 'gfr_ckd', 'stage', 'message_gfr', 'cvd_risk', 'urine_protein', 'hdl', 'ldl', 'cholesterol', 'triglyceride', 'hba1c', 'microalbumin', 'fbs', 'bps', 'bpd', 'smoke', 'lat', 'lng', 'bmi'], 'string', 'max' => 255],
            [['hn'], 'string', 'max' => 9],
            [['clinic'], 'string', 'max' => 3],
            [['icd10', 'sendto'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vn' => 'Vn',
            'vstdate' => 'Vstdate',
            'hn' => 'Hn',
            'clinic' => 'Clinic',
            'icd10' => 'Icd10',
            'cr' => 'Cr',
            'gfr_thai' => 'Gfr Thai',
            'gfr_ckd' => 'Gfr Ckd',
            'stage' => 'Stage',
            'message_gfr' => 'Message Gfr',
            'cvd_risk' => 'Cvd Risk',
            'urine_protein' => 'Urine Protein',
            'hdl' => 'Hdl',
            'ldl' => 'Ldl',
            'cholesterol' => 'Cholesterol',
            'triglyceride' => 'Triglyceride',
            'hba1c' => 'Hba1c',
            'microalbumin' => 'Microalbumin',
            'fbs' => 'Fbs',
            'bps' => 'Bps',
            'bpd' => 'Bpd',
            'smoke' => 'Smoke',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'hosconfirm' => 'Hosconfirm',
            'ssoconfirm' => 'Ssoconfirm',
            'sendto' => 'Sendto',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
            'age' => 'Age',
            'bmi' => 'Bmi',
            'bloodgrp' => 'หมู่เลือด',
            'next_app_date' => 'Next App Date',
        ];
    }
    public function getPatient()
    {
        return $this->hasOne(Patients::className(),['hn'=>'hn']);
    }
}
