<?php

namespace app\models\ref\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ref\RefRegion;

/**
 * RefRegionSearch represents the model behind the search form about `app\models\ref\RefRegion`.
 */
class RefRegionSearch extends RefRegion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'founded_year', 'ceo_full_name', 'work_number', 'address', 'folder'], 'safe'],
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
        $query = RefRegion::find();

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
            'id' => $this->id,
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
