<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pctstokemi;

/**
 * PctstokemiSearch represents the model behind the search form about `app\models\Pctstokemi`.
 */
class PctstokemiSearch extends Pctstokemi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typedchreferback','id',  'drug', 'typedch'], 'integer'],
            [['cid','referbackdate','hn','pname', 'name', 'age_y', 'sex', 'status','druguse', 'addrpart', 'moopart', 'tmbpart', 'main_pdx','pdx', 'admitdate', 'referdate', 'hospname_refer', 'dchdate', 'result_black', 'sendteam', 'username', 'appointdate', 'sign', 'note1', 'note2', 'note3', 'createdate', 'updatedate'], 'safe'],
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
        $query = Pctstokemi::find();

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
            'cid' => $this->cid,
            'hn' => $this->hn,
            'drug' => $this->drug,
            'sex' => $this->sex,
            'admitdate' => $this->admitdate,
            'dchdate' => $this->dchdate,
            'referbackdate'=> $this->referbackdate,
            'typedchreferback'=> $this->typedchreferback,
            'typedch' => $this->typedch,
            'appointdate' => $this->appointdate,
            'status' => $this->status,
            'createdate' => $this->createdate,
            'updatedate' => $this->updatedate,
        ]);

        $query->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'age_y', $this->age_y])
            ->andFilterWhere(['like', 'druguse', $this->druguse])
            ->andFilterWhere(['like', 'addrpart', $this->addrpart])
            ->andFilterWhere(['like', 'moopart', $this->moopart])
            ->andFilterWhere(['like', 'tmbpart', $this->tmbpart])
            ->andFilterWhere(['like', 'main_pdx', $this->main_pdx])    
            ->andFilterWhere(['like', 'pdx', $this->pdx])
            ->andFilterWhere(['like', 'referdate', $this->referdate])
            ->andFilterWhere(['like', 'hospname_refer', $this->hospname_refer])
            ->andFilterWhere(['like', 'result_black', $this->result_black])
            ->andFilterWhere(['like', 'sendteam', $this->sendteam])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'sign', $this->sign])
            ->andFilterWhere(['like', 'note1', $this->note1])
            ->andFilterWhere(['like', 'note2', $this->note2])
            ->andFilterWhere(['like', 'note3', $this->note3]);

        return $dataProvider;
    }
}
