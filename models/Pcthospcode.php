<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pcthospcode".
 *
 * @property string $hospcode
 * @property string $hosptype
 * @property string $name
 * @property string $tmbpart
 * @property string $amppart
 * @property string $chwpart
 */
class Pcthospcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pcthospcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospcode'], 'string', 'max' => 5],
            [['hosptype'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 100],
            [['tmbpart', 'amppart', 'chwpart'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hospcode' => 'Hospcode',
            'hosptype' => 'Hosptype',
            'name' => 'Name',
            'tmbpart' => 'Tmbpart',
            'amppart' => 'Amppart',
            'chwpart' => 'Chwpart',
        ];
    }
}
