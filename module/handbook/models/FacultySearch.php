<?php

namespace app\module\handbook\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\handbook\models\Faculty;

/**
 * FacultySearch represents the model behind the search form about `app\module\handbook\models\Faculty`.
 */
class FacultySearch extends Faculty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faculty_id', 'id_edbo', 'id_deanery'], 'integer'],
            [['faculty_name'], 'safe'],
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
        $query = Faculty::find();

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
            'faculty_id' => $this->faculty_id,
            'id_edbo' => $this->id_edbo,
            'id_deanery' => $this->id_deanery,
        ]);

        $query->andFilterWhere(['like', 'faculty_name', $this->faculty_name]);

        return $dataProvider;
    }
}
