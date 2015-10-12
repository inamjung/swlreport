<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PctClinicVisit]].
 *
 * @see PctClinicVisit
 */
class PctClinicVisitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PctClinicVisit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PctClinicVisit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}