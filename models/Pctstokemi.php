<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pctstokemi".
 *
 * @property integer $id
 * @property integer $cid
 * @property string $hn
 * @property string $pname
 * @property string $name
 * @property string $age_y
 * @property integer $drug
 * @property string $druguse
 * @property integer $sex
 * @property string $addrpart
 * @property string $moopart
 * @property string $tmbpart
 * @property string $main_pdx
 * @property string $pdx
 * @property string $admitdate
 * @property string $referdate
 * @property string $hospname_refer
 * @property string $dchdate
 * @property integer $typedch
 * @property integer $referbackdate
 * @property integer $typedchreferback
 * @property integer $typedch
 * @property string $result_black
 * @property string $sendteam
 * @property string $username
 * @property string $appointdate
 * @property string $sign
 * @property integer $status
 * @property integer $birthday
 * @property string $note1
 * @property string $note2
 * @property string $note3
 * @property string $createdate
 * @property string $updatedate
 */
class Pctstokemi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
public $age;

public function getAge()
{
    // age in format yyyy-mm-dd
    if(isset($this->age)) return $this->age;
    else {
        $birthday = explode("-", $this->birthday);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthday[1], $birthday[2], $birthday[0]))) > date("md")
            ? ((date("Y") - $birthday[2]) - 1)
            : (date("Y") - $birthday[2]));
        $this->age = $age;
        return $age;
    }
}
    
    public static function tableName()
    {
        return 'pctstokemi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typedchreferback','drug',  'typedch'], 'integer'],
            [['birthday','referbackdate','admitdate', 'dchdate', 'appointdate', 'createdate', 'updatedate'], 'safe'],
            [['result_black', 'sign'], 'string'],
            [['cid'], 'string', 'max' => 18],
            [['pname', 'addrpart','sex','status'], 'string', 'max' => 20],
            [['hn'], 'string', 'max' => 9],
            [['name', 'age_y', 'druguse', 'main_pdx', 'pdx', 'referdate', 'hospname_refer', 'sendteam', 'username', 'note1', 'note2', 'note3'], 'string', 'max' => 255],
            [['moopart', 'tmbpart'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'Cid',
            'hn' => 'HN',
            'pname' => 'คำนำหน้า',
            'name' => 'ชื่่อ-สกุล',
            'age_y' => 'อายุ',
            'drug' => 'ยาที่ใช้',
            'druguse' => 'วิธีให้ยา',
            'sex' => 'Sex',
            'addrpart' => 'ที่อยู่',
            'moopart' => 'หมู่บ้าน',
            'tmbpart' => 'ตำบล',
            'main_pdx' => 'Main_pdx',
            'pdx' => 'Pdx',
            'admitdate' => 'วันที่admit',
            'referdate' => 'วันที่refer',
            'hospname_refer' => 'สถานที่ส่งต่อ',
            'dchdate' => 'Dchdate',
            'typedch' => 'Typedch',
            'referbackdate','referbackdate',
            'typedchreferback'=>'typedchreferback',
            'result_black' => 'Result Black',
            'sendteam' => 'ส่งต่อ',
            'username' => 'Username',
            'appointdate' => 'วันนัด',
            'sign' => 'อาการ',
            'status' => 'Status',
            'note1' => 'Note1',
            'note2' => 'Note2',
            'note3' => 'Note3',
            'birthday'=>'วันเกิด',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
        ];
    }
}
