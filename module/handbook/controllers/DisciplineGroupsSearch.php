<?php

namespace app\module\handbook\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\handbook\models\DisciplineGroups;

/**
 * DisciplineGroupsSearch represents the model behind the search form about `app\module\handbook\models\DisciplineGroups`.
 */
class DisciplineGroupsSearch extends DisciplineGroups
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_discipline', 'id_group'], 'integer'],
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
        $query = DisciplineGroups::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_discipline' => $this->id_discipline,
            'id_group' => $this->id_group,
        ]);

        return $dataProvider;
    }
}
