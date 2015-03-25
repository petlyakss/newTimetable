<?php

namespace app\module\handbook\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\handbook\models\Cathedra;

/**
 * CathedraSearch represents the model behind the search form about `app\module\handbook\models\Cathedra`.
 */
class CathedraSearch extends Cathedra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cathedra_id', 'id_edbo', 'id_deanery', 'id_faculty'], 'integer'],
            [['cathedra_name'], 'safe'],
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
        $query = Cathedra::find();

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
            'cathedra_id' => $this->cathedra_id,
            'id_edbo' => $this->id_edbo,
            'id_deanery' => $this->id_deanery,
            'id_faculty' => $this->id_faculty,
        ]);

        $query->andFilterWhere(['like', 'cathedra_name', $this->cathedra_name]);

        return $dataProvider;
    }
}
