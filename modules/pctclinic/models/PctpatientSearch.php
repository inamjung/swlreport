<?php

namespace app\modules\pctclinic\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\pctclinic\models\Pctpatient;

/**
 * PctpatientSearch represents the model behind the search form about `app\modules\pctclinic\models\Pctpatient`.
 */
class PctpatientSearch extends Pctpatient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age'], 'integer'],
            [['pname', 'name', 'sex', 'birthday', 'cid', 'addrpart', 'moopart', 'tmbpart_id', 'amppart_id', 'chwpart_id', 'tel', 'hospcode', 'hn', 'main_pdx', 'pdx1', 'gis', 'latitude', 'longitude', 'avatar1', 'createdate', 'updatedate', 'docs', 'covenant', 'ref', 'status', 'username', 'moo', 'drug', 'regdate', 'pstatus', 'ptype', 'confirmin', 'cvd_risk', 'stage'], 'safe'],
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
        $query = Pctpatient::find()
                ->where(['ptype'=>['ST','MI']
                    ])                
                ->groupBy(['hn']);

       $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>15
            ],
            'sort' => [                
            'defaultOrder'=>[
            'id'=> 'SORT_DESC',
                    ]               
               ],
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
            'birthday' => $this->birthday,
            'createdate' => $this->createdate,
            'updatedate' => $this->updatedate,
            'regdate' => $this->regdate,
        ]);

        $query->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'addrpart', $this->addrpart])
            ->andFilterWhere(['like', 'moopart', $this->moopart])
            ->andFilterWhere(['like', 'tmbpart_id', $this->tmbpart_id])
            ->andFilterWhere(['like', 'amppart_id', $this->amppart_id])
            ->andFilterWhere(['like', 'chwpart_id', $this->chwpart_id])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'main_pdx', $this->main_pdx])
            ->andFilterWhere(['like', 'pdx1', $this->pdx1])
            ->andFilterWhere(['like', 'gis', $this->gis])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'avatar1', $this->avatar1])
            ->andFilterWhere(['like', 'docs', $this->docs])
            ->andFilterWhere(['like', 'covenant', $this->covenant])
            ->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'moo', $this->moo])
            ->andFilterWhere(['like', 'drug', $this->drug])
            ->andFilterWhere(['like', 'pstatus', $this->pstatus])
            ->andFilterWhere(['like', 'ptype', $this->ptype])
            ->andFilterWhere(['like', 'confirmin', $this->confirmin])
            ->andFilterWhere(['like', 'cvd_risk', $this->cvd_risk])
            ->andFilterWhere(['like', 'stage', $this->stage]);

        return $dataProvider;
    }
}
