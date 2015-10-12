<?php

namespace app\modules\pctclinic\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\pctclinic\models\Pctmooban;

/**
 * PctmoobanSearch represents the model behind the search form about `app\modules\pctclinic\models\Pctmooban`.
 */
class PctmoobanSearch extends Pctmooban
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['mooban', 'tmbpart', 'hospcode', 'amppart'], 'safe'],
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
        $query = Pctmooban::find();

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

        $query->andFilterWhere(['like', 'mooban', $this->mooban])
            ->andFilterWhere(['like', 'tmbpart', $this->tmbpart])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'amppart', $this->amppart]);

        return $dataProvider;
    }
}
