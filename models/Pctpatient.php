<?php

namespace app\models;


use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Url;

/**
 * This is the model class for table "pctpatient".
 *
 * @property integer $id
 * @property string $pname
 * @property string $name
 * @property integer $sex
 * @property string $birthday
 * @property string $cid
 * @property string $addrpart
 * @property string $moopart
 * @property string $tmbpart_id
 * @property string $amppart_id
 * @property string $chwpart_id
 * @property string $tel
 * @property string $hospcode
 * @property string $hn
 * @property string $main_pdx
 * @property string $pdx1
 * @property string $age
 * @property string $moo
 * @property string $drug
 * @property string $gis
 * @property string $latijod
 * @property string $longtijod
 * @property string $avatar1
 * @property string $status
 * @property string $username
 * @property string $createdate
 * @property string $updatedate
 * @property string $docs
 * @property string $covenant
 * @property string $ref
 * @property string $regdate
 * @property string $pstatus
 * @property string $ptype
 */
class Pctpatient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const UPLOAD_FOLDER='pctpatients';
     
    const STATUS_IN = 1;
    const STATUS_OUT = 3;
    const STATUS_DEATH = 2;
    
    
    const PSTATUS_COC = 1;
    const PSTATUS_ADMIT = 2;
    const PSTATUS_REFER = 3;
    const PSTATUS_CLINIC = 4;
    const PSTATUS_RPST = 5;   
    
    const PTYPE_ST= 1;
    const PTYPE_MI= 2;
    
    public static $statuses = [1=>'ยังรักษาอยู่', 2=>'ตาย',3=>'ไม่อยู่ในพื้นที่'];
    public static $pstatuses = [1=>'COC', 2=>'Admit',3=>'Refer',4=>'คลินิกเรื้อรัง',5=>'รพ.สต'];
    public static $ptypes = ['ST'=>'ST','MI'=>'MI'];
     
    public static $imagePath = '@webroot/pctpatients/';
     
    public function getFull_Name()
{
   return $this->pname . '' . $this->name;
}
     
    public static function tableName()
    {
        return 'pctpatient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['cid'], 'required'],
            [['age'], 'integer'],
            [['birthday', 'createdate', 'updatedate','regdate'], 'safe'],
            [['sex','status','pname', 'addrpart', 'tel'], 'string', 'max' => 20],
            [['pstatus','drug','name', 'gis', 'latijod', 'longtijod', 'avatar1', 'username', 'docs', 'covenant'], 'string', 'max' => 255],
            [['cid'], 'string', 'max' => 18],
            [['moo','amppart_id', 'chwpart_id'], 'string', 'max' => 2],
            [['hospcode'], 'string', 'max' => 7],
            [['hn'], 'string', 'max' => 9],
            [['ptype'], 'string', 'max' => 6],
            [['main_pdx', 'pdx1'], 'string', 'max' => 5],
            [['ref','moopart', 'tmbpart_id'], 'string', 'max' => 50],
            [['ref'], 'unique'],
            [['chwpart_id'], 'default','value'=>38],
            [['amppart_id'], 'default','value'=>07],
            [['status'],'default','value'=>3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'เลข fk กับ upload ใช้กับ upload ajax',
            'pname' => 'คำนำหน้า',
            'name' => 'ชื่อ-สกุล',
            'age' => 'อายุ',
            'sex' => 'เพศ',            
            'birthday' => 'วันเกิด',
            'cid' => 'Cid',
            'addrpart' => 'ที่อยู่',
            'moopart' => 'หมู่บ้าน',
            'tmbpart_id' => 'ตำบลที่อยู่',
            'amppart_id' => 'อำเภอ',
            'chwpart_id' => 'จังหวัด',
            'tel' => 'โทรศัพท์',
            'hospcode' => 'รพ.สต',
            'hn' => 'HN',
            'main_pdx' => 'รหัสโรค',
            'regdate'=>'วันที่Diag',
            'pdx1' => 'รหัสโรครอง',            
            'gis' => 'Gis',
            'drug' => 'ยาที่ใช้',
            'moo' => 'หมู่ที่',
            'latijod' => 'Latijod',
            'longtijod' => 'Longtijod',
            'avatar1' => 'รูปประจำตัว',
            'username' => 'Username',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
            'docs' => 'Docs',
            'covenant' => 'Covenant',            
            'status'=>'Status',
            'ptype'=>'โรคประจำตัว',
            'pstatus'=>'สถานะการรักษา'
        ];
    }
    public static function itemAlias($type,$code=NULL) {
        $_items = array(
            'sex' => array(
                'ชาย' => 'ชาย',
                'หญิง' => 'หญิง',
            ), 
            'status' => array(
                '1' => 'ยังรักษาอยู่',
                '2' => 'ตาย',
                '3'=>'ไม่อยู่ในพื้นที่',
            ), 
            'pstatus' => array(
                '1' => 'COC',
                '2' => 'Admit',
                '3'=>'Refer',
                '4'=>'คลินิกเรื้อรัง',
                '5'=>'รพ.สต',
            ),
            'ptype' => array(
                'ST' => 'STROKE',
                'MI' => 'MI',
            ),
         );
        

        if (isset($code)){
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        }
        else{         
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
    
   public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }

    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
    }

    public function getThumbnails($ref,$name){
         $uploadFiles   = Uploads::find()->where(['ref'=>$ref])->all();
         $preview = [];
        foreach ($uploadFiles as $file) {
            $preview[] = [
                'url'=>self::getUploadUrl(true).$ref.'/'.$file->real_filename,
                'src'=>self::getUploadUrl(true).$ref.'/thumbnail/'.$file->real_filename,
                'options' => ['title' => $name]
            ];
        }
        return $preview;
    }
    public function getStokemi(){
        return $this->hasMany(Pctstokemi::className(),['cid'=>'cid']);
    }
    public function getAddress(){
        return $this->hasOne(Pctaddress::className(), ['tmbpart'=>'tmbpart_id']);
    }
    public function getHospcodes(){
        return $this->hasOne(Pcthospcode::className(), ['hospcode'=>'hospcode']);
    }
}
