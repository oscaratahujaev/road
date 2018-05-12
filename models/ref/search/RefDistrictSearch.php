<?php

namespace app\models\ref\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ref\RefDistrict;

/**
 * RefDistrictSearch represents the model behind the search form of `app\models\ref\RefDistrict`.
 */
class RefDistrictSearch extends RefDistrict
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'region_id'], 'integer'],
            [['name', 'founded_year', 'ceo_full_name', 'work_number', 'address', 'folder'], 'safe'],
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
        $query = RefDistrict::find();

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
            'founded_year' => $this->founded_year,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ceo_full_name', $this->ceo_full_name])
            ->andFilterWhere(['like', 'work_number', $this->work_number])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'folder', $this->folder]);

        return $dataProvider;
    }
}
