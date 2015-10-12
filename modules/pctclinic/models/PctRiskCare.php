<?php

namespace app\modules\pctclinic\models;

use Yii;

/**
 * This is the model class for table "pct_risk_care".
 *
 * @property integer $id
 * @property string $cid
 * @property string $hn
 * @property string $name
 * @property string $givesend
 * @property string $givercare
 * @property string $giver
 * @property integer $rpstok
 * @property string $givertel
 * @property string $giver1
 * @property string $datecare
 * @property string $createdate
 * @property string $updatedate
 */
class PctRiskCare extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pct_risk_care';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['givesend', 'givercare'], 'string'],            
            [['datecare', 'createdate', 'updatedate','rpstok','risk_id','vn'], 'safe'],
            [['cid'], 'string', 'max' => 18],
            [['hn'], 'string', 'max' => 9],
            [['name', 'giver', 'giver1'], 'string', 'max' => 255],
            [['givertel'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'risk_id'=>'RiskID',
            'cid' => 'Cid',
            'vn'=>'VN',
            'hn' => 'Hn',
            'name' => 'ชื่อ-สกุล',
            'givesend' => 'คำแนะนำการเยี่ยมบ้าน',
            'givercare' => 'Givercare',
            'giver' => 'Giver',
            'rpstok' => 'รพ.สต.รับเคส',
            'givertel' => 'Givertel',
            'giver1' => 'Giver1',
            'datecare' => 'Datecare',
            'createdate' => 'วันที่บันทึก',
            'updatedate' => 'Updatedate',
        ];
    }
    
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->createdate = date('Y-m-d');
        } else {
            $this->updatedate = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }
    
    public function getDate() {
        return date('Y-m-d H:i:s', $this->createdate);
    }
    
    public function getPctrisk(){
        return $this->hasOne(PctRiskCare::className(), ['cid'=>'cid']);
    }
    public function getperson(){
        return $this->hasOne(PctPerRpst::className(), ['id'=>'giver']);
    }
}
