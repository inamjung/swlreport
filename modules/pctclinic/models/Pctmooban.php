<?php

namespace app\modules\pctclinic\models;

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
            [['mooban', 'tmbpart'], 'string', 'max' => 50],
            [['hospcode'], 'string', 'max' => 5],
            [['amppart'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mooban' => 'Mooban',
            'tmbpart' => 'Tmbpart',
            'hospcode' => 'Hospcode',
            'amppart' => 'Amppart',
        ];
    }
}
