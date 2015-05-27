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
            [['cathedra_id', 'id_edbo'], 'integer'],
            [['cathedra_name','id_faculty', 'id_deanery'], 'safe'],
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
            'query' => $query
        ]);

        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('faculty');
        
        $dataProvider->setSort([
            'attributes' => [        
                'cathedra_name' => [
                    'asc' => ['cathedra_name' => SORT_ASC],
                    'desc' => ['cathedra_name' => SORT_DESC],
                    'label' => 'Факультет/спеціальність'
                ],
                'id_faculty' => [
                    'asc' => ['faculty.faculty_name' => SORT_ASC],
                    'desc' => ['faculty.faculty_name' => SORT_DESC],
                    'label' => 'Факультет/спеціальність'
                ]                
            ]
        ]);
        
        
        $query->andFilterWhere([
            'cathedra_id' => $this->cathedra_id,
            'id_edbo' => $this->id_edbo,
            'id_deanery' => $this->id_deanery,
        ]);

        $query->andFilterWhere(['like', 'cathedra_name', $this->cathedra_name])
              ->andFilterWhere(['like', 'faculty.faculty_name', $this->id_faculty]);

        return $dataProvider;
    }
}
