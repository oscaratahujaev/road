<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BookRecords;

/**
 * BookRecordsSearch represents the model behind the search form of `app\models\BookRecords`.
 */
class BookRecordsSearch extends BookRecords
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'book_id', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            [['date', 'visit_start', 'visit_end', 'visit_place_owner', 'place_address', 'stated_problems', 'identified_problems', 'solution_deadline_start', 'solution_deadline_end', 'reason'], 'safe'],
            [['accomplishment', 'owner_acquainted', 'problem_resolved'], 'boolean'],
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
        $query = BookRecords::find();

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
            'book_id' => $this->book_id,
            'date' => $this->date,
            'visit_start' => $this->visit_start,
            'visit_end' => $this->visit_end,
            'solution_deadline_start' => $this->solution_deadline_start,
            'solution_deadline_end' => $this->solution_deadline_end,
            'accomplishment' => $this->accomplishment,
            'owner_acquainted' => $this->owner_acquainted,
            'problem_resolved' => $this->problem_resolved,
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'modifier' => $this->modifier,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'visit_place_owner', $this->visit_place_owner])
            ->andFilterWhere(['like', 'place_address', $this->place_address])
            ->andFilterWhere(['like', 'stated_problems', $this->stated_problems])
            ->andFilterWhere(['like', 'identified_problems', $this->identified_problems])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}
