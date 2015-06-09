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
    public $groups_name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discipline_distribution_id', 'id_edbo', 'id_deanery',  'id_group', 'course', 'hours', 'semestr_hours', 'id_classroom'], 'integer'],
            [['id_cathedra', 'id_discipline', 'id_lessons_type', 'groups_name'], 'safe']
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
        //$query = Discipline::find();
        
        $query = Discipline::find()
          ->joinWith(['disciplineGroups', 'disciplineGroups.group']);
        
        $query->joinWith('cathedra');
        $query->joinWith('disciplineName');
        $query->joinWith('lessonsType');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
        'attributes' => [ 
            'id_discipline' => [
                'asc' => ['discipline_name' => SORT_ASC],
                'desc' => ['discipline_name' => SORT_DESC]
            ], 
            'id_cathedra' => [
                'asc' => ['cathedra.cathedra_name' => SORT_ASC],
                'desc' => ['cathedra.cathedra_name' => SORT_DESC]
            ],
            'id_lessons_type' => [
                'asc' => ['lesson_type_name' => SORT_ASC],
                'desc' => ['lesson_type_name' => SORT_DESC]
            ],
            'course' => [
                'asc' => ['course' => SORT_ASC],
                'desc' => ['course' => SORT_DESC]
            ],
            'hours' => [
                'asc' => ['hours' => SORT_ASC],
                'desc' => ['hours' => SORT_DESC]
            ],
            'semestr_hours' => [
                'asc' => ['semestr_hours' => SORT_ASC],
                'desc' => ['semestr_hours' => SORT_DESC]
            ],
            'id_group' => [
                'asc' => ['groups.main_group_name' => SORT_ASC],
                'desc' => ['groups.main_group_name' => SORT_DESC]
            ],
        ]
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //$query->joinWith('disciplineList');
        $query->joinWith('cathedra');
        
        $query->andFilterWhere([
            'discipline_distribution_id' => $this->discipline_distribution_id,
            'id_edbo' => $this->id_edbo,
            'id_deanery' => $this->id_deanery,
            //'id_lessons_type' => $this->id_lessons_type,
            //'id_group' => $this->id_group,
            'course' => $this->course,
            'hours' => $this->hours,
            'semestr_hours' => $this->semestr_hours,
            'id_classroom' => $this->id_classroom,
        ]);

        $query->andFilterWhere(['like', 'discipline_name', $this->id_discipline])
                ->andFilterWhere(['like', 'cathedra.cathedra_name', $this->id_cathedra])
                ->andFilterWhere(['like', 'main_group_name', $this->groups_name])
                ->andFilterWhere(['like', 'lesson_type_name', $this->id_lessons_type]);
        

        return $dataProvider;
    }
}
