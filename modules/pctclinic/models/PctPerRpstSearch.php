<?php

namespace app\modules\pctclinic\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\pctclinic\models\PctPerRpst;

/**
 * PctPerRpstSearch represents the model behind the search form about `app\modules\pctclinic\models\PctPerRpst`.
 */
class PctPerRpstSearch extends PctPerRpst
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'rpst', 'tel', 'position'], 'safe'],
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
        $query = PctPerRpst::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'rpst', $this->rpst])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'position', $this->position]);

        return $dataProvider;
    }
}
