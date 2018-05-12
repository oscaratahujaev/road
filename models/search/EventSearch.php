<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Event;

/**
 * EventSearch represents the model behind the search form of `app\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'event_type_id', 'region_id', 'district_id', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            [['title', 'realiz_mechanism', 'result', 'basis_file', 'deadline', 'event_number', 'responsible'], 'safe'],
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
        $query = Event::find();

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
            'deadline' => $this->deadline,
            'event_type_id' => $this->event_type_id,
            'region_id' => $this->region_id,
            'district_id' => $this->district_id,
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'modifier' => $this->modifier,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'realiz_mechanism', $this->realiz_mechanism])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'basis_file', $this->basis_file])
            ->andFilterWhere(['like', 'event_number', $this->event_number])
            ->andFilterWhere(['like', 'responsible', $this->responsible]);

        return $dataProvider;
    }
}
