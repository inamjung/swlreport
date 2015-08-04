<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pctpname".
 *
 * @property string $namep
 * @property integer $class
 * @property string $sex
 * @property string $provis_code
 * @property string $hos_guid
 * @property string $fullname
 * @property string $hos_guid_ext
 * @property integer $min_age
 */
class Pctpname extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pctpname';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['namep'], 'required'],
            [['class', 'min_age'], 'integer'],
            [['name', 'fullname'], 'string', 'max' => 100],
            [['sex'], 'string', 'max' => 1],
            [['provis_code'], 'string', 'max' => 5],
            [['hos_guid'], 'string', 'max' => 38],
            [['hos_guid_ext'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'namep' => 'Name',
            'class' => 'Class',
            'sex' => 'Sex',
            'provis_code' => 'Provis Code',
            'hos_guid' => 'Hos Guid',
            'fullname' => 'Fullname',
            'hos_guid_ext' => 'Hos Guid Ext',
            'min_age' => 'Min Age',
        ];
    }
}
