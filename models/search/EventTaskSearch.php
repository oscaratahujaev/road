<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EventTask;

/**
 * EventTaskSearch represents the model behind the search form of `app\models\EventTask`.
 */
class EventTaskSearch extends EventTask
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'event_id', 'category_id', 'deadline_type', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            [['mahalla', 'title', 'deadline_date', 'deadline_text', 'realiz_mechanism'], 'safe'],
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
        $query = EventTask::find();

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
            'category_id' => $this->category_id,
            'deadline_type' => $this->deadline_type,
            'deadline_date' => $this->deadline_date,
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'modifier' => $this->modifier,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'mahalla', $this->mahalla])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'deadline_text', $this->deadline_text])
            ->andFilterWhere(['like', 'realiz_mechanism', $this->realiz_mechanism]);

        return $dataProvider;
    }
}
