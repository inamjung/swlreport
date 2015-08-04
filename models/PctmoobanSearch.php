<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pctmooban;

/**
 * PctmoobanSearch represents the model behind the search form about `app\models\Pctmooban`.
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
        $dataProvider->query->joinWith('tmbpart1');
        $dataProvider->query->joinWith('hospcode1');
        
        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        $query->andFilterWhere(['like', 'mooban', $this->mooban])            
            ->andFilterWhere(['like', 'pcthospcode.name', $this->hospcode])
            ->andFilterWhere(['like', 'pctaddress.name', $this->tmbpart])    
            ->andFilterWhere(['like', 'amppart', $this->amppart]);

        return $dataProvider;
    }
}
