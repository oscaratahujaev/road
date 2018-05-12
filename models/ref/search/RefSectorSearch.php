<?php

namespace app\models\ref\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ref\RefSector;

/**
 * RefSectorSearch represents the model behind the search form of `app\models\ref\RefSector`.
 */
class RefSectorSearch extends RefSector
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'district_id', 'sector_number'], 'integer'],
            [['name', 'ceo_full_name', 'ceo_position', 'phone_number', 'work_number', 'address'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = RefSector::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'district_id' => $this->district_id,
            'sector_number' => $this->sector_number,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ceo_full_name', $this->ceo_full_name])
            ->andFilterWhere(['like', 'ceo_position', $this->ceo_position])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'work_number', $this->work_number])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
