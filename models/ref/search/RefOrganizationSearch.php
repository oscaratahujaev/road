<?php

namespace app\models\ref\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ref\RefOrganization;

/**
 * RefOrganizationSearch represents the model behind the search form about `app\models\ref\RefOrganization`.
 */
class RefOrganizationSearch extends RefOrganization
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            [['name'], 'safe'],
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
        $query = RefOrganization::find();

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
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'modifier' => $this->modifier,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
