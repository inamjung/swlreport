<?php

namespace app\modules\dpac\models;

use Yii;

/**
 * This is the model class for table "drinking_type".
 *
 * @property integer $drinking_type_id
 * @property string $drinking_type_name
 * @property string $hos_guid
 * @property string $nhso_code
 */
class DrinkingTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drinking_type';
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
            [['drinking_type_id'], 'required'],
            [['drinking_type_id'], 'integer'],
            [['drinking_type_name'], 'string', 'max' => 150],
            [['hos_guid'], 'string', 'max' => 38],
            [['nhso_code'], 'string', 'max' => 1],
            [['drinking_type_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'drinking_type_id' => 'Drinking Type ID',
            'drinking_type_name' => 'Drinking Type Name',
            'hos_guid' => 'Hos Guid',
            'nhso_code' => 'Nhso Code',
        ];
    }
}
