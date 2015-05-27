<?php

namespace app\module\handbook\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\handbook\models\Speciality;

/**
 * SpecialitySearch represents the model behind the search form about `app\module\handbook\models\Speciality`.
 */
class SpecialitySearch extends Speciality
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['speciality_id', 'id_edebo'], 'integer'],
            [['speciality_name', 'id_faculty', 'id_cathedra'], 'safe'],
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
        $query = Speciality::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query->joinWith('faculty');
        $query->joinWith('cathedra');

        $dataProvider->setSort([
            'attributes' => [
                'speciality_name' => [
                    'asc' => ['speciality_name' => SORT_ASC],
                    'desc' => ['speciality_name' => SORT_DESC]
                ],
                'id_cathedra' => [
                    'asc' => ['cathedra.cathedra_name' => SORT_ASC],
                    'desc' => ['cathedra.cathedra_name' => SORT_DESC]
                ],
                'id_faculty' => [
                    'asc' => ['faculty.faculty_name' => SORT_ASC],
                    'desc' => ['faculty.faculty_name' => SORT_DESC]
                ]
            ]
        ]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        


        $query->andFilterWhere([
            'speciality_id' => $this->speciality_id,
            'id_edebo' => $this->id_edebo                
        ]);

        $query->andFilterWhere(['like', 'speciality_name', $this->speciality_name])
                 ->andFilterWhere(['like', 'faculty.faculty_name', $this->id_faculty])
                ->andFilterWhere(['like', 'cathedra.cathedra_name', $this->id_cathedra]);

        return $dataProvider;
    }
}
