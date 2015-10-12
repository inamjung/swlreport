<?php

namespace app\modules\pctclinic\models;

use Yii;

/**
 * This is the model class for table "pct_perpo_rpst".
 *
 * @property integer $id
 * @property string $name
 */
class PctPerpoRpst extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pct_perpo_rpst';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ตำแหน่ง',
        ];
    }
}
