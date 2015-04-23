<?php

namespace app\module\handbook\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\handbook\models\DisciplineList;

/**
 * DisciplineListSearch represents the model behind the search form about `app\module\handbook\models\DisciplineList`.
 */
class DisciplineListSearch extends DisciplineList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discipline_id'], 'integer'],
            [['discipline_name'], 'safe'],
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
        $query = DisciplineList::find();

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
            'discipline_id' => $this->discipline_id,
        ]);

        $query->andFilterWhere(['like', 'discipline_name', $this->discipline_name]);

        return $dataProvider;
    }
}
