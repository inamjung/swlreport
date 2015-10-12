<?php

namespace app\modules\pctclinic\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\pctclinic\models\PctRiskCare;

/**
 * PctRiskCareSearch represents the model behind the search form about `app\modules\pctclinic\models\PctRiskCare`.
 */
class PctRiskCareSearch extends PctRiskCare
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['cid', 'rpstok', 'hn','vn', 'risk_id', 'name', 'givesend', 'givercare', 'giver', 'givertel', 'giver1', 'datecare', 'createdate', 'updatedate'], 'safe'],
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
        $query = PctRiskCare::find();

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
            'rpstok' => $this->rpstok,
            'datecare' => $this->datecare,
            'createdate' => $this->createdate,
            'updatedate' => $this->updatedate,
        ]);

        $query->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'vn', $this->vn])    
            ->andFilterWhere(['like', 'risk_id', $this->risk_id])    
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'givesend', $this->givesend])
            ->andFilterWhere(['like', 'givercare', $this->givercare])
            ->andFilterWhere(['like', 'giver', $this->giver])
            ->andFilterWhere(['like', 'givertel', $this->givertel])
            ->andFilterWhere(['like', 'giver1', $this->giver1]);

        return $dataProvider;
    }
}
