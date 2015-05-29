<?php

namespace app\module\handbook\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\handbook\models\ClassRooms;
use app\module\handbook\models\Housing;

/**
 * ClassRoomsSearch represents the model behind the search form about `app\module\handbook\models\ClassRooms`.
 */
class ClassRoomsSearch extends ClassRooms
{
    public $class_type_name;
    public $housing_name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classrooms_id',  'seats', 'comp_number', 'is_public'], 'integer'],
            [['classrooms_number', 'options','class_type_name','id_housing', 'housing_name'], 'safe'],
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
        $query = ClassRooms::find()
          ->joinWith(['classTypes', 'classTypes.specClass']);

        //$query->joinWith('specClass');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $this->load($params);

        $dataProvider->setSort([
            'attributes' => [                
                'options' => [
                    'asc' => ['classTypes.specClass' => SORT_ASC],
                    'desc' => ['classTypes.specClass' => SORT_DESC]
                ]
            ]
        ]);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        //$query = ClassRooms::find()->joinWith('housing');
        $query->joinWith('housing');
  
        $query->andFilterWhere([
            'classrooms_id' => $this->classrooms_id,
            'seats' => $this->seats,
            'comp_number' => $this->comp_number,
        ]);

        $query->andFilterWhere(['like', 'classrooms_number', $this->classrooms_number])
            ->andFilterWhere(['like', 'options', $this->options])
            ->andFilterWhere(['like', 'spec_class_name', $this->class_type_name])
            ->andFilterWhere(['like', 'name', $this->id_housing]);
        
        $query->andFilterWhere(['like', 'housing.name', $this->housing_name]);

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}
