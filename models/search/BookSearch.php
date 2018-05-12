<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form of `app\models\Book`.
 */
class BookSearch extends Book
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'region_id', 'district_id', 'sector_id', 'decision_number', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            [['sector_head', 'head_position', 'head_workplace', 'head_address', 'decision_date', 'governor_head', 'prosecutor_head', 'affair_head', 'tax_head'], 'safe'],
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
        $query = Book::find();

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
            'region_id' => $this->region_id,
            'district_id' => $this->district_id,
            'sector_id' => $this->sector_id,
            'decision_number' => $this->decision_number,
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'modifier' => $this->modifier,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'sector_head', $this->sector_head])
            ->andFilterWhere(['like', 'head_position', $this->head_position])
            ->andFilterWhere(['like', 'head_workplace', $this->head_workplace])
            ->andFilterWhere(['like', 'head_address', $this->head_address])
            ->andFilterWhere(['like', 'decision_date', $this->decision_date])
            ->andFilterWhere(['like', 'governor_head', $this->governor_head])
            ->andFilterWhere(['like', 'prosecutor_head', $this->prosecutor_head])
            ->andFilterWhere(['like', 'affair_head', $this->affair_head])
            ->andFilterWhere(['like', 'tax_head', $this->tax_head]);

        return $dataProvider;
    }
}
