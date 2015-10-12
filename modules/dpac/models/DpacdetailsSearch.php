<?php

namespace app\modules\dpac\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\dpac\models\Dpacdetails;

/**
 * DpacdetailsSearch represents the model behind the search form about `app\modules\dpac\models\Dpacdetails`.
 */
class DpacdetailsSearch extends Dpacdetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age', 'gfr_thai', 'gfr_ckd', 'cvd_risk', 'confirm'], 'integer'],
            [['hn', 'waist', 'sugar', 'disease', 'bloodgrp', 'bmi', 'ldl', 'cho', 'tg', 'cr', 'ckd', 'kidney', 'akram', 'date', 'cid', 'stage', 'hdl', 'tc', 'microalbumin', 'fbs', 'bps', 'bpd', 'smoke', 'name', 'bp', 'shoulder', 'armleft', 'armright', 'legleft', 'legright', 'calfleft', 'calfright', 'chest'], 'safe'],
            [['weight', 'height'], 'number'],
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
        $query = Dpacdetails::find();

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
            'id' => $this->id,
            'weight' => $this->weight,
            'height' => $this->height,
            'date' => $this->date,
            'age' => $this->age,
            'gfr_thai' => $this->gfr_thai,
            'gfr_ckd' => $this->gfr_ckd,
            'cvd_risk' => $this->cvd_risk,
            'confirm' => $this->confirm,
        ]);

        $query->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'waist', $this->waist])
            ->andFilterWhere(['like', 'sugar', $this->sugar])
            ->andFilterWhere(['like', 'disease', $this->disease])
            ->andFilterWhere(['like', 'bloodgrp', $this->bloodgrp])
            ->andFilterWhere(['like', 'bmi', $this->bmi])
            ->andFilterWhere(['like', 'ldl', $this->ldl])
            ->andFilterWhere(['like', 'cho', $this->cho])
            ->andFilterWhere(['like', 'tg', $this->tg])
            ->andFilterWhere(['like', 'cr', $this->cr])
            ->andFilterWhere(['like', 'ckd', $this->ckd])
            ->andFilterWhere(['like', 'kidney', $this->kidney])
            ->andFilterWhere(['like', 'akram', $this->akram])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'stage', $this->stage])
            ->andFilterWhere(['like', 'hdl', $this->hdl])
            ->andFilterWhere(['like', 'tc', $this->tc])
            ->andFilterWhere(['like', 'microalbumin', $this->microalbumin])
            ->andFilterWhere(['like', 'fbs', $this->fbs])
            ->andFilterWhere(['like', 'bps', $this->bps])
            ->andFilterWhere(['like', 'bpd', $this->bpd])
            ->andFilterWhere(['like', 'smoke', $this->smoke])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'bp', $this->bp])
            ->andFilterWhere(['like', 'shoulder', $this->shoulder])
            ->andFilterWhere(['like', 'armleft', $this->armleft])
            ->andFilterWhere(['like', 'armright', $this->armright])
            ->andFilterWhere(['like', 'legleft', $this->legleft])
            ->andFilterWhere(['like', 'legright', $this->legright])
            ->andFilterWhere(['like', 'calfleft', $this->calfleft])
            ->andFilterWhere(['like', 'calfright', $this->calfright])
            ->andFilterWhere(['like', 'chest', $this->chest]);

        return $dataProvider;
    }
}
