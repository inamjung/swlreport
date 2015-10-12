<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PctDrugClinicVisit;

/**
 * PctDrugClinicVisitSearch represents the model behind the search form about `app\models\PctDrugClinicVisit`.
 */
class PctDrugClinicVisitSearch extends PctDrugClinicVisit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['vn', 'hn', 'icode', 'vstdate'], 'safe'],
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
        $query = PctDrugClinicVisit::find();

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
            'vstdate' => $this->vstdate,
        ]);

        $query->andFilterWhere(['like', 'vn', $this->vn])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'icode', $this->icode]);

        return $dataProvider;
    }
}
