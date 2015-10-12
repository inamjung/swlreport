<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PctClinicVisit;

/**
 * PctClinicVisitSearch represents the model behind the search form about `app\models\PctClinicVisit`.
 */
class PctClinicVisitSearch extends PctClinicVisit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vn', 'vstdate','next_app_date', 'hn', 'clinic', 'icd10', 'cr', 'gfr_thai', 'gfr_ckd', 'stage', 'message_gfr', 'cvd_risk', 'urine_protein', 'hdl', 'ldl', 'cholesterol', 'triglyceride', 'hba1c', 'microalbumin', 'fbs', 'bps', 'bpd', 'smoke', 'lat', 'lng', 'sendto', 'createdate', 'updatedate'], 'safe'],
            [['hosconfirm', 'ssoconfirm','age','bmi'], 'integer'],
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
        $query = PctClinicVisit::find()
                ->where(['cvd_risk' => [2,3,4,5]])
                ;

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
            'vstdate' => $this->vstdate,
            'next_app_date' => $this->vstdate,
            'hosconfirm' => $this->hosconfirm,
            'ssoconfirm' => $this->ssoconfirm,
            'createdate' => $this->createdate,
            'updatedate' => $this->updatedate,
        ]);

        $query->andFilterWhere(['like', 'vn', $this->vn])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'clinic', $this->clinic])
            ->andFilterWhere(['like', 'icd10', $this->icd10])
            ->andFilterWhere(['like', 'cr', $this->cr])
            ->andFilterWhere(['like', 'gfr_thai', $this->gfr_thai])
            ->andFilterWhere(['like', 'gfr_ckd', $this->gfr_ckd])
            ->andFilterWhere(['like', 'stage', $this->stage])
            ->andFilterWhere(['like', 'message_gfr', $this->message_gfr])
            ->andFilterWhere(['like', 'cvd_risk', $this->cvd_risk])
            ->andFilterWhere(['like', 'urine_protein', $this->urine_protein])
            ->andFilterWhere(['like', 'hdl', $this->hdl])
            ->andFilterWhere(['like', 'ldl', $this->ldl])
            ->andFilterWhere(['like', 'cholesterol', $this->cholesterol])
            ->andFilterWhere(['like', 'triglyceride', $this->triglyceride])
            ->andFilterWhere(['like', 'hba1c', $this->hba1c])
            ->andFilterWhere(['like', 'microalbumin', $this->microalbumin])
            ->andFilterWhere(['like', 'fbs', $this->fbs])
            ->andFilterWhere(['like', 'bps', $this->bps])
            ->andFilterWhere(['like', 'bpd', $this->bpd])
            ->andFilterWhere(['like', 'smoke', $this->smoke])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lng', $this->lng])
            ->andFilterWhere(['like', 'age', $this->age])
            ->andFilterWhere(['like', 'bmi', $this->bmi])    
            ->andFilterWhere(['like', 'sendto', $this->sendto])
            ;

        return $dataProvider;
    }
}
