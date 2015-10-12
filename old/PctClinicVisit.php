<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pct_clinic_visit".
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
 * @property string $age
 * @property string $bmi
 * @property string $next_app_date
 */
class PctClinicVisit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
       
   //public $patientName;
    //public $bp;
    public $name;
    public $addrpart;
    public $moopart;   
    public $tmbpart_id;
    public $sex;
    public $informtel;
    public $birthday;
    
    
    
    public function getBp()
    {
       return $this->bps . ' / ' . $this->bpd;
    }
    public function getPatientName(){
        return @$this->hospatient->pname.''.@$this->hospatient->fname.' '.@$this->hospatient->lname;
    }    
    public function getPatientCid(){
        return @$this->hospatient->cid;        
    }
     public function getPatientTmbpart(){
        return @$this->hospatient->tmbpart;
     }
     public function getPatientAddrpart(){
        return @$this->hospatient->addrpart;
     }
     public function getPatientMoopart(){
        return @$this->hospatient->moopart;
     }
      public function getPatientSex(){
        return @$this->hospatient->sex;
     }
     public function getPatientInformtel(){
        return @$this->hospatient->informtel;
     }
     public function getPatientBirthday(){
        return @$this->hospatient->birthday;
     }
     
    public static function tableName()
    {
        return 'pct_clinic_visit';
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
            [['vstdate', 'createdate', 'updatedate','next_app_date'], 'safe'],
            [['hosconfirm', 'ssoconfirm','bmi','age'], 'integer'],
            [['vn', 'cr', 'gfr_thai', 'gfr_ckd', 'stage', 'message_gfr', 'cvd_risk', 'urine_protein', 'hdl', 'ldl', 'cholesterol', 'triglyceride', 'hba1c', 'microalbumin', 'fbs', 'bps', 'bpd', 'smoke', 'lat', 'lng'], 'string', 'max' => 255],
            [['hn'], 'string', 'max' => 9],
            [['clinic'], 'string', 'max' => 3],
            [['ssoconfirm'],'default','value'=>'0'],           
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
            'gfr_ckd' => 'Gfr',
            'stage' => 'Stage',
            'message_gfr' => 'Message Gfr',
            'cvd_risk' => 'Cvd',
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
            'next_app_date'=>'วันนัดถัดไป',
            'age'=>'อายุ',
            'bmi'=>'Bmi'
            //'statustype' => 'Statustype',
        ];
    }
    public static function itemAlias($type,$code=NULL) {
        $_items = array(
            'sendto' => array(
                'ไม่' => 'ไม่เสี่ยง',
                'ST' => 'เสี่ยง Stroke',
                'MI' => 'เสี่ยง MI',
            ), 
            'hosconfirm' => array(                
                '1'=> 'YES',
                '0' => 'NO',                
            ), 
            'ssoconfirm' => array(                
                '1' => 'ยืนยัน',
                '0' => 'ยังไม่ยืนยัน',                
            ), 
        );
        

        if (isset($code)){
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        }
        else{         
            return isset($_items[$type]) ? $_items[$type] : false;    
        }
    }

    /**
     * @inheritdoc
     * @return PctClinicVisitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PctClinicVisitQuery(get_called_class());
    }
    
    
    
        public function getHospatient(){
        return $this->hasOne(Hospatient::className(), ['hn'=>'hn']);
    }
    public function getHosclinic(){
        return $this->hasOne(Hosclinic::className(), ['clinic'=>'clinic']);
    }
    public function getPctdisease(){
        return $this->hasOne(Pctdisease::className(), ['code'=>'icd10']);
    }
    public function getHosdrug(){
        return $this->hasMany(Hosdrugitems::className(), ['icode'=>'icode']);
    }
}
