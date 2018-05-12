<?php

namespace app\models\ref\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ref\RefMahalla;

/**
 * RefMahallaSearch represents the model behind the search form of `app\models\ref\RefMahalla`.
 */
class RefMahallaSearch extends RefMahalla
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sector_id'], 'integer'],
            [['name', 'ceo_full_name', 'phone_number', 'work_number'], 'safe'],
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
        $query = RefMahalla::find();

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
            'sector_id' => $this->sector_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ceo_full_name', $this->ceo_full_name])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'work_number', $this->work_number]);

        return $dataProvider;
    }
}
