<?php

namespace app\modules\pctclinic\models;

use Yii;

/**
 * This is the model class for table "smoking_type".
 *
 * @property integer $smoking_type_id
 * @property string $smoking_type_name
 * @property string $hos_guid
 * @property string $nhso_code
 */
class SmokingType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smoking_type';
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
            [['smoking_type_id'], 'required'],
            [['smoking_type_id'], 'integer'],
            [['smoking_type_name'], 'string', 'max' => 150],
            [['hos_guid'], 'string', 'max' => 38],
            [['nhso_code'], 'string', 'max' => 1],
            [['smoking_type_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'smoking_type_id' => 'Smoking Type ID',
            'smoking_type_name' => 'Smoking Type Name',
            'hos_guid' => 'Hos Guid',
            'nhso_code' => 'Nhso Code',
        ];
    }
}
