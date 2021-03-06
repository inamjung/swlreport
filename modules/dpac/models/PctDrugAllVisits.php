<?php

namespace app\modules\dpac\models;

use Yii;

/**
 * This is the model class for table "pct_drug_all_visit".
 *
 * @property integer $id
 * @property string $vn
 * @property string $hn
 * @property string $icode
 * @property string $vstdate
 */
class PctDrugAllVisits extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pct_drug_all_visit';
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
            [['id'], 'required'],
            [['id'], 'integer'],
            [['vstdate'], 'safe'],
            [['vn', 'icode'], 'string', 'max' => 255],
            [['hn'], 'string', 'max' => 9]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vn' => 'Vn',
            'hn' => 'Hn',
            'icode' => 'Icode',
            'vstdate' => 'Vstdate',
        ];
    }
}
