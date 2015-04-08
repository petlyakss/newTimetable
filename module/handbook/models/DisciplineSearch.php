<?php

namespace app\module\handbook\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\handbook\models\Discipline;

/**
 * DisciplineSearch represents the model behind the search form about `app\module\handbook\models\Discipline`.
 */
class DisciplineSearch extends Discipline
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discipline_distribution_id', 'id_discipline', 'id_edbo', 'id_deanery', 'id_cathedra', 'id_lessons_type', 'id_group', 'course', 'hours', 'semestr_hours', 'id_classroom'], 'integer'],
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
        $query = Discipline::find();

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
            'discipline_distribution_id' => $this->discipline_distribution_id,
            'id_discipline' => $this->id_discipline,
            'id_edbo' => $this->id_edbo,
            'id_deanery' => $this->id_deanery,
            'id_cathedra' => $this->id_cathedra,
            'id_lessons_type' => $this->id_lessons_type,
            'id_group' => $this->id_group,
            'course' => $this->course,
            'hours' => $this->hours,
            'semestr_hours' => $this->semestr_hours,
            'id_classroom' => $this->id_classroom,
        ]);

        return $dataProvider;
    }
}
