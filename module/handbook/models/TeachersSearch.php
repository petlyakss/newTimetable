<?php

namespace app\module\handbook\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\handbook\models\Teachers;

/**
 * TeachersSearch represents the model behind the search form about `app\module\handbook\models\Teachers`.
 */
class TeachersSearch extends Teachers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'id_position', 'id_academic_status', 'id_cathedra'], 'integer'],
            [['teacher_name'], 'safe'],
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
        $query = Teachers::find();

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
            'teacher_id' => $this->teacher_id,
            'id_position' => $this->id_position,
            'id_academic_status' => $this->id_academic_status,
            'id_cathedra' => $this->id_cathedra,
        ]);

        $query->andFilterWhere(['like', 'teacher_name', $this->teacher_name]);

        return $dataProvider;
    }
}
