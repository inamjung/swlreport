<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pctdrug".
 *
 * @property integer $id
 * @property string $drug
 * @property string $didcode
 */
class Pctdrug extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pctdrug';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['drug', 'didcode'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'drug' => 'ชื่อยา',
            'didcode' => 'รหัส24หลัก',
        ];
    }
}
