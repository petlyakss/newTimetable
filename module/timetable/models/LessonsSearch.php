<?php

namespace app\module\timetable\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\timetable\models\Lessons;

/**
 * LessonsSearch represents the model behind the search form about `app\module\timetable\models\Lessons`.
 */
class LessonsSearch extends Lessons
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lesson_id', 'id_group', 'id_faculty', 'id_speciality', 'course', 'semester', 'id_okr', 'is_numerator', 'id_discipline', 'id_teacher', 'id_classroom', 'day', 'is_holiday', 'all_group', 'all_speciality', 'lesson_number'], 'integer'],
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
        $query = Lessons::find();

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
            'lesson_id' => $this->lesson_id,
            'id_group' => $this->id_group,
            'id_faculty' => $this->id_faculty,
            'id_speciality' => $this->id_speciality,
            'course' => $this->course,
            'semester' => $this->semester,
            'id_okr' => $this->id_okr,
            'is_numerator' => $this->is_numerator,
            'id_discipline' => $this->id_discipline,
            'id_teacher' => $this->id_teacher,
            'id_classroom' => $this->id_classroom,
            'day' => $this->day,
            'is_holiday' => $this->is_holiday,
            'all_group' => $this->all_group,
            'all_speciality' => $this->all_speciality,
            'lesson_number' => $this->lesson_number,
        ]);

        return $dataProvider;
    }
}
