<?php

namespace app\modules\pctclinic\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Url;

/**
 * This is the model class for table "pct_risk".
 *
 * @property integer $id
 * @property string $hn
 * @property string $name
 * @property string $sex
 * @property integer $age
 * @property string $cid
 * @property string $addrpart
 * @property string $moo
 * @property string $moopart
 * @property string $tmbpart_id
 * @property string $amppart_id
 * @property string $chwpart_id
 * @property string $tel
 * @property string $hospcode
 * @property string $main_pdx
 * @property string $pdx1
 * @property string $cvd_risk
 * @property string $stage
 * @property string $gis
 * @property string $latitude
 * @property string $longitude
 * @property string $avatar1
 * @property string $docs
 * @property string $covenant
 * @property string $ref
 * @property string $drug
 * @property string $regdate
 * @property string $pstatus
 * @property string $ptype
 * @property string $confirmin
 * @property string $sendrpst
 * @property string $rpstok
 * @property string $username
 * @property string $createdate
 * @property string $updatedate
 */
class PctRisk extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    const UPLOAD_FOLDER = 'pctrisks';
    
    const STATUS_IN = 1;
    const STATUS_OUT = 3;
    const STATUS_DEATH = 2;
    const PSTATUS_NO = 0;
    const PSTATUS_COC = 1;
    const PSTATUS_ADMIT = 2;
    const PSTATUS_REFER = 3;
    const PSTATUS_CLINIC = 4;
    const PSTATUS_RPST = 5;
    const PSTATUS_PCU = 6;
    const PTYPE_ST = 1;
    const PTYPE_MI = 2;

    public $patientName;
    public $tmbpart;
    //public static $statuses = [1=>'ยังรักษาอยู่', 2=>'ตาย',3=>'ไม่อยู่ในพื้นที่'];
    public static $pstatuses = [0 => 'รอดำเนินการ', 1 => 'COC', 2 => 'Admit', 3 => 'Refer', 4 => 'คลินิกเรื้อรัง', 5 => 'รพ.สต', 6 => 'PCU'];
    public static $ptypes = ['ไม่' => 'ไม่', 'ST' => 'ST', 'MI' => 'MI'];
    public static $imagePath = '@webroot/pctriskpic/';
    

    public function getFull_Name() {
        return $this->pname . '' . $this->name;
    }

    public function getPatientName() {
        return @$this->hospatient->pname . '' . @$this->hospatient->fname . ' ' . @$this->hospatient->lname;
    }

    public static function tableName() {
        return 'pct_risk';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['age', 'confirmin', 'rpstok'], 'integer'],
            [['birthday', 'vn','createdate', 'updatedate', 'regdate', 'chwpart_id', 'main_pdx'], 'safe'],
            [['cid', 'tmbpart_id'], 'required'],
            [['sex', 'addrpart', 'tel'], 'string', 'max' => 20],
            [['name', 'gis', 'latitude', 'longitude', 'avatar1', 'docs', 'covenant', 'username', 'drug', 'pstatus', 'cvd_risk', 'stage'], 'string', 'max' => 255],
            [['cid'], 'string', 'max' => 18],
            [['moopart', 'tmbpart_id', 'ref'], 'string', 'max' => 50],
            [['amppart_id', 'chwpart_id', 'moo'], 'string', 'max' => 2],
            [['hospcode'], 'string', 'max' => 7],
            [['hn'], 'string', 'max' => 9],
            [['givesend'], 'string', 'max' => 500],
            [['main_pdx', 'pdx1'], 'string', 'max' => 5],
            [['ptype'], 'string', 'max' => 10],
            [['ref', 'moopart', 'tmbpart_id'], 'string', 'max' => 50],
            [['ref'], 'unique'],
            [['confirmin', 'rpstok'], 'default', 'value' => 0],
            [['chwpart_id'], 'default', 'value' => 38],
            [['amppart_id'], 'default', 'value' => 07],
                //[['status'],'default','value'=>3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'vn'=>'VN',
            'hn' => 'HN',
            'name' => 'ชื่อ-สกุล',
            'sex' => 'เพศ',
            'age' => 'อายุ',
            'cid' => 'Cid',
            'addrpart' => 'ที่อยู่',
            'moo' => 'หมู่',
            'moopart' => 'หมู่บ้าน',
            'tmbpart_id' => 'ตำบล',
            'amppart_id' => 'อำเภอ',
            'chwpart_id' => 'จังหวัด',
            'tel' => 'โทรศัพท์',
            'hospcode' => 'hospcode',
            'main_pdx' => 'main_pdx',
            'pdx1' => 'pdx1',
            'cvd_risk' => 'Cvd Risk',
            'stage' => 'Stage',
            'gis' => 'Gis',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'avatar1' => 'รูปประจำตัว',
            'docs' => 'Docs',
            'covenant' => 'Covenant',
            'ref' => 'Ref',
            'drug' => 'ยาที่ใช้',
            'regdate' => 'วันที่diag',
            'pstatus' => 'สถานะการรักษา',
            'ptype' => 'โรคประจำตัว',
            'confirmin' => 'รับเข้าระบบ',
            'sendrpst' => 'ส่ง รพ.สต',
            'rpstok' => 'รพ.สต รับเคส',
            'givesend' => 'คำแนะนำการลงเยี่ยมบ้าน',
            'username' => 'Username',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
        ];
    }

    public static function itemAlias($type, $code = NULL) {
        $_items = array(
            'sex' => array(
                '1' => 'ชาย',
                '2' => 'หญิง',
            ),
//            'status' => array(
//                '1' => 'ยังรักษาอยู่',
//                '2' => 'ตาย',
//                '3'=>'ไม่อยู่ในพื้นที่',
//            ), 
            'pstatus' => array(
                '0' => 'รอดำเนินการ',
                '1' => 'COC',
                '2' => 'Admit',
                '3' => 'Refer',
                '4' => 'คลินิกเรื้อรัง',
                '5' => 'รพ.สต',
                '6' => 'PCU',
            ),
            'ptype' => array(
                'ไม่' => 'ไม่',
                'ST' => 'STROKE',
                'MI' => 'MI',
            ),
            'confirmin' => array(
                'YES' => 'YES',
                'NO' => 'NO',
            ),
        );


        if (isset($code)) {
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        } else {
            return isset($_items[$type]) ? $_items[$type] : false;
        }
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->createdate = date('Y-m-d H:i:s');
        } else {
            $this->updatedate = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }

    public function getDate() {
        return date('Y-m-d H:i:s', $this->createdate);
    }

    public function getAddress() {
        return $this->hasOne(Pctaddress::className(), ['tmbpart' => 'tmbpart_id']);
    }

    public function getHospcodes() {
        return $this->hasOne(\app\models\Pcthospcode::className(), ['hospcode' => 'hospcode']);
    }

    public function getPctriskcare() {
        return $this->hasMany(PctRiskCare::className(), ['risk_id' => 'id']);
    }

    public function getPctriskcare1() {
        return $this->hasMany(PctRiskCare::className(), ['risk_id' => 'id']);
    }
    public function getAddress1(){
        return $this->hasOne(Pctaddress::className(), ['tmbpart'=>'tmbpart_id']);
    }
    public function getMooban(){
        return $this->hasOne(Pctmooban::className(), ['mooban'=>'moopart']);
    }

    public static function getUploadPath() {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/';
    }

    public static function getUploadUrl() {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/';
    }

    public function getThumbnails($ref, $event_name) {
        $uploadFiles = Uploadpctrisk::find()->where(['ref' => $ref])->all();
        $preview = [];
        foreach ($uploadFiles as $file) {
            $preview[] = [
                'url' => self::getUploadUrl(true) . $ref . '/' . $file->real_filename,
                'src' => self::getUploadUrl(true) . $ref . '/thumbnail/' . $file->real_filename,
                'options' => ['title' => $event_name]
            ];
        }
        return $preview;
    }

}
