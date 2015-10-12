<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hospatient;

/**
 * HospatientSearch represents the model behind the search form about `app\models\Hospatient`.
 */
class HospatientSearch extends Hospatient
{
    /**
     * @inheritdoc
     */
   public $name;
    public function rules()
    {
        return [
            [['hos_guid', 'name','hn', 'pname', 'fname', 'lname', 'occupation', 'citizenship', 'birthday', 'addrpart', 'moopart', 'tmbpart', 'amppart', 'chwpart', 'bloodgrp', 'clinic', 'deathday', 'drugallergy', 'fathername', 'firstday', 'hometel', 'informaddr', 'informname', 'informrelation', 'informtel', 'marrystatus', 'mathername', 'nationality', 'opdlocation', 'pttype', 'religion', 'sex', 'spsname', 'truebirthday', 'workaddr', 'worktel', 'hcode', 'cid', 'educate', 'family_status', 'labor_type', 'last_update', 'type_area', 'road', 'father_cid', 'mother_cid', 'couple_cid', 'person_type', 'private_doctor_name', 'legal_action', 'death_code504', 'death_diag', 'node_id', 'admit', 'midname', 'po_code', 'fatherlname', 'motherlname', 'spslname', 'country', 'email', 'birthtime', 'mother_hn', 'last_visit', 'death', 'inregion', 'reg_time', 'oldcode', 'lang', 'gov_chronic_id', 'in_cups', 'addr_soi', 'work_addr', 'father_hn', 'alias_name', 'destroyed', 'old_addr', 'fname_soundex', 'lname_soundex', 'bloodgroup_rh', 'passport_no', 'addressid', 'mobile_phone_number', 'anonymous_person', 'ec_fname', 'ec_lname', 'membercard_no'], 'safe'],
            [['familyno', 'hn_int', 'hid', 'height', 'patient_type_id', 'hospital_department_id', 'ec_relation_type_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Hospatient::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'birthday' => $this->birthday,
            'deathday' => $this->deathday,
            'familyno' => $this->familyno,
            'firstday' => $this->firstday,
            'hn_int' => $this->hn_int,
            'hid' => $this->hid,
            'last_update' => $this->last_update,
            'birthtime' => $this->birthtime,
            'last_visit' => $this->last_visit,
            'height' => $this->height,
            'reg_time' => $this->reg_time,
            'patient_type_id' => $this->patient_type_id,
            'hospital_department_id' => $this->hospital_department_id,
            'ec_relation_type_id' => $this->ec_relation_type_id,
        ]);

        $query->andFilterWhere(['like', 'hos_guid', $this->hos_guid])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->andFilterWhere(['like', 'citizenship', $this->citizenship])
            ->andFilterWhere(['like', 'addrpart', $this->addrpart])
            ->andFilterWhere(['like', 'moopart', $this->moopart])
            ->andFilterWhere(['like', 'tmbpart', $this->tmbpart])
            ->andFilterWhere(['like', 'amppart', $this->amppart])
            ->andFilterWhere(['like', 'chwpart', $this->chwpart])
            ->andFilterWhere(['like', 'bloodgrp', $this->bloodgrp])
            ->andFilterWhere(['like', 'clinic', $this->clinic])
            ->andFilterWhere(['like', 'drugallergy', $this->drugallergy])
            ->andFilterWhere(['like', 'fathername', $this->fathername])
            ->andFilterWhere(['like', 'hometel', $this->hometel])
            ->andFilterWhere(['like', 'informaddr', $this->informaddr])
            ->andFilterWhere(['like', 'informname', $this->informname])
            ->andFilterWhere(['like', 'informrelation', $this->informrelation])
            ->andFilterWhere(['like', 'informtel', $this->informtel])
            ->andFilterWhere(['like', 'marrystatus', $this->marrystatus])
            ->andFilterWhere(['like', 'mathername', $this->mathername])
            ->andFilterWhere(['like', 'nationality', $this->nationality])
            ->andFilterWhere(['like', 'opdlocation', $this->opdlocation])
            ->andFilterWhere(['like', 'pttype', $this->pttype])
            ->andFilterWhere(['like', 'religion', $this->religion])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'spsname', $this->spsname])
            ->andFilterWhere(['like', 'truebirthday', $this->truebirthday])
            ->andFilterWhere(['like', 'workaddr', $this->workaddr])
            ->andFilterWhere(['like', 'worktel', $this->worktel])
            ->andFilterWhere(['like', 'hcode', $this->hcode])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'educate', $this->educate])
            ->andFilterWhere(['like', 'family_status', $this->family_status])
            ->andFilterWhere(['like', 'labor_type', $this->labor_type])
            ->andFilterWhere(['like', 'type_area', $this->type_area])
            ->andFilterWhere(['like', 'road', $this->road])
            ->andFilterWhere(['like', 'father_cid', $this->father_cid])
            ->andFilterWhere(['like', 'mother_cid', $this->mother_cid])
            ->andFilterWhere(['like', 'couple_cid', $this->couple_cid])
            ->andFilterWhere(['like', 'person_type', $this->person_type])
            ->andFilterWhere(['like', 'private_doctor_name', $this->private_doctor_name])
            ->andFilterWhere(['like', 'legal_action', $this->legal_action])
            ->andFilterWhere(['like', 'death_code504', $this->death_code504])
            ->andFilterWhere(['like', 'death_diag', $this->death_diag])
            ->andFilterWhere(['like', 'node_id', $this->node_id])
            ->andFilterWhere(['like', 'admit', $this->admit])
            ->andFilterWhere(['like', 'midname', $this->midname])
            ->andFilterWhere(['like', 'po_code', $this->po_code])
            ->andFilterWhere(['like', 'fatherlname', $this->fatherlname])
            ->andFilterWhere(['like', 'motherlname', $this->motherlname])
            ->andFilterWhere(['like', 'spslname', $this->spslname])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'mother_hn', $this->mother_hn])
            ->andFilterWhere(['like', 'death', $this->death])
            ->andFilterWhere(['like', 'inregion', $this->inregion])
            ->andFilterWhere(['like', 'oldcode', $this->oldcode])
            ->andFilterWhere(['like', 'lang', $this->lang])
            ->andFilterWhere(['like', 'gov_chronic_id', $this->gov_chronic_id])
            ->andFilterWhere(['like', 'in_cups', $this->in_cups])
            ->andFilterWhere(['like', 'addr_soi', $this->addr_soi])
            ->andFilterWhere(['like', 'work_addr', $this->work_addr])
            ->andFilterWhere(['like', 'father_hn', $this->father_hn])
            ->andFilterWhere(['like', 'alias_name', $this->alias_name])
            ->andFilterWhere(['like', 'destroyed', $this->destroyed])
            ->andFilterWhere(['like', 'old_addr', $this->old_addr])
            ->andFilterWhere(['like', 'fname_soundex', $this->fname_soundex])
            ->andFilterWhere(['like', 'lname_soundex', $this->lname_soundex])
            ->andFilterWhere(['like', 'bloodgroup_rh', $this->bloodgroup_rh])
            ->andFilterWhere(['like', 'passport_no', $this->passport_no])
            ->andFilterWhere(['like', 'addressid', $this->addressid])
            ->andFilterWhere(['like', 'mobile_phone_number', $this->mobile_phone_number])
            ->andFilterWhere(['like', 'anonymous_person', $this->anonymous_person])
            ->andFilterWhere(['like', 'ec_fname', $this->ec_fname])
            ->andFilterWhere(['like', 'ec_lname', $this->ec_lname])
            ->andFilterWhere(['like', 'membercard_no', $this->membercard_no]);

        return $dataProvider;
    }
}
