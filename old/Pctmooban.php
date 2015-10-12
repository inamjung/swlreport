<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pctmooban".
 *
 * @property integer $id
 * @property string $mooban
 * @property string $tmbpart
 * @property string $hospcode
 * @property string $amppart
 */
class Pctmooban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pctmooban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tmbpart', 'mooban'], 'string', 'max' => 50],
            [['amppart'], 'string', 'max' => 2],
            [['hospcode'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mooban' => 'หมู่บ้าน',
            'tmbpart' => 'ตำบล',
            'hospcode' => 'ขึ้นกับ รพ.สต',
            'amppart' => 'อำเภอ',
        ];
    }
    
    public static function itemAlias($type,$code=NULL) {
        $_items = array(
            'tmbpart' => array(
                '01' => 'ศรีวิไล',
                '02' => 'ชุมภูพร',
                '03' => 'นาแสง',
                '04' => 'นาสะแบง',
                '05' => 'นาสิงห์',
                
                
            ), 
            'hospcode' => [
                '04889' => 'รพ.สต ชุมภูพร',
                '04890' => 'รพ.สต นาแสง',
                '04891' => 'รพ.สต นาคำแคน',
                '04892' => 'รพ.สต นาสะแบง',
                '04893' => 'รพ.สต นาสิงห์',
                '11049' => 'รพ.ศรีวิไล'
           ],
          
        );
        

        if (isset($code)){
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        }
        else{         
            return isset($_items[$type]) ? $_items[$type] : false;    
        }
    }
    
    public function getTmbpart1(){
        return $this->hasOne(\app\models\Pctaddress::className(), ['tmbpart'=>'tmbpart']);
    }
    public function getHospcode1(){
        return $this->hasOne(\app\models\Pcthospcode::className(), ['hospcode'=>'hospcode']);
    }
}
