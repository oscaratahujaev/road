<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EventSectorDetail;

/**
 * EventSectorDetailSearch represents the model behind the search form of `app\models\EventSectorDetail`.
 */
class EventSectorDetailSearch extends EventSectorDetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'event_id', 'sector_id', 'mahalla_number', 'sum', 'sum_unit_id', 'repaired_object', 'repaired_road', 'road_unit_id', 'employed', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
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
        $query = EventSectorDetail::find();

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
            'event_id' => $this->event_id,
            'sector_id' => $this->sector_id,
            'mahalla_number' => $this->mahalla_number,
            'sum' => $this->sum,
            'sum_unit_id' => $this->sum_unit_id,
            'repaired_object' => $this->repaired_object,
            'repaired_road' => $this->repaired_road,
            'road_unit_id' => $this->road_unit_id,
            'employed' => $this->employed,
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'modifier' => $this->modifier,
            'modified_at' => $this->modified_at,
        ]);

        return $dataProvider;
    }
}
