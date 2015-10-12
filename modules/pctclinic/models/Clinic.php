<?php

namespace app\modules\pctclinic\models;

use Yii;

/**
 * This is the model class for table "clinic".
 *
 * @property string $clinic
 * @property string $name
 * @property string $labparam
 * @property string $icd10
 * @property string $chronic
 * @property string $clinic_guid
 * @property integer $pcu_code
 * @property string $oapp_activity_id
 * @property string $disable_dialog
 * @property string $hos_guid
 * @property string $no_export
 * @property string $active_status
 * @property integer $hosxp_clinic_type_id
 */
class Clinic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clinic';
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
            [['clinic'], 'required'],
            [['pcu_code', 'hosxp_clinic_type_id'], 'integer'],
            [['clinic'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 150],
            [['labparam'], 'string', 'max' => 10],
            [['icd10'], 'string', 'max' => 6],
            [['chronic', 'disable_dialog', 'no_export', 'active_status'], 'string', 'max' => 1],
            [['clinic_guid', 'hos_guid'], 'string', 'max' => 38],
            [['oapp_activity_id'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clinic' => 'Clinic',
            'name' => 'Name',
            'labparam' => 'Labparam',
            'icd10' => 'Icd10',
            'chronic' => 'Chronic',
            'clinic_guid' => 'Clinic Guid',
            'pcu_code' => 'Pcu Code',
            'oapp_activity_id' => 'Oapp Activity ID',
            'disable_dialog' => 'Disable Dialog',
            'hos_guid' => 'Hos Guid',
            'no_export' => 'No Export',
            'active_status' => 'Active Status',
            'hosxp_clinic_type_id' => 'Hosxp Clinic Type ID',
        ];
    }
}
