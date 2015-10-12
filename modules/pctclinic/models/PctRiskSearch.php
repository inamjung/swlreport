<?php

namespace app\modules\pctclinic\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\pctclinic\models\PctRisk;

/**
 * PctRiskSearch represents the model behind the search form about `app\modules\pctclinic\models\PctRisk`.
 */
class PctRiskSearch extends PctRisk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age', 'confirmin'], 'integer'],
            [['givesend','hn','vn', 'name', 'sex', 'cid', 'addrpart', 'moo', 'moopart', 'tmbpart_id', 'amppart_id', 'chwpart_id', 'tel', 'hospcode', 'main_pdx', 'pdx1', 'cvd_risk', 'stage', 'gis', 'latitude', 'longitude', 'avatar1', 'docs', 'covenant', 'ref', 'drug', 'regdate', 'pstatus', 'ptype', 'sendrpst', 'rpstok', 'username', 'createdate', 'updatedate'], 'safe'],
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
        $query = PctRisk::find();

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
            'age' => $this->age,
            'regdate' => $this->regdate,
            'createdate' => $this->createdate,
            'updatedate' => $this->updatedate,
        ]);

        $query->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'name', $this->name]) 
            ->andFilterWhere(['like', 'vn', $this->vn])    
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'addrpart', $this->addrpart])
            ->andFilterWhere(['like', 'moo', $this->moo])
            ->andFilterWhere(['like', 'moopart', $this->moopart])
            ->andFilterWhere(['like', 'tmbpart_id', $this->tmbpart_id])
            ->andFilterWhere(['like', 'amppart_id', $this->amppart_id])
            ->andFilterWhere(['like', 'chwpart_id', $this->chwpart_id])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'main_pdx', $this->main_pdx])
            ->andFilterWhere(['like', 'pdx1', $this->pdx1])
            ->andFilterWhere(['like', 'cvd_risk', $this->cvd_risk])
            ->andFilterWhere(['like', 'stage', $this->stage])
            ->andFilterWhere(['like', 'gis', $this->gis])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'avatar1', $this->avatar1])
            ->andFilterWhere(['like', 'docs', $this->docs])
            ->andFilterWhere(['like', 'covenant', $this->covenant])
            ->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'drug', $this->drug])
            ->andFilterWhere(['like', 'givesend', $this->givesend])    
            ->andFilterWhere(['like', 'pstatus', $this->pstatus])
            ->andFilterWhere(['like', 'ptype', $this->ptype])
            ->andFilterWhere(['like', 'confirmin', $this->confirmin])
            ->andFilterWhere(['like', 'sendrpst', $this->sendrpst])
            ->andFilterWhere(['like', 'rpstok', $this->rpstok])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
