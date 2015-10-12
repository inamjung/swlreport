<?php

namespace app\modules\pctclinic\models;

use Yii;

/**
 * This is the model class for table "pct_per_rpst".
 *
 * @property integer $id
 * @property string $name
 * @property string $rpst
 * @property string $tel
 * @property string $position
 */
class PctPerRpst extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pct_per_rpst';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['rpst', 'tel'], 'string', 'max' => 20],
            [['position'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'จนท.รพ.สต',
            'rpst' => 'รพ.สต.',
            'tel' => 'โทรศัพท์',
            'position' => 'ตำแหน่ง',
        ];
    }
}
