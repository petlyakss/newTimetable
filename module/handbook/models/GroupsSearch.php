<?php

namespace app\module\handbook\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\handbook\models\Groups;

/**
 * GroupsSearch represents the model behind the search form about `app\module\handbook\models\Groups`.
 */
class GroupsSearch extends Groups
{
    /**
     * Для пошуку по підгрупам
     * @var string 
     */
    public $sub_group;
    public $spec_full_name;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'is_subgroup', 'id_speciality', 'inflow_year', 'parent_group'], 'integer'],
            [['main_group_name','sub_group', 'spec_full_name'], 'safe'],
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
        $query = Groups::find()->joinWith(['speciality',
          'speciality.faculty']);
        //$query->addSelect( [new \yii\db\Expression("CONCAT(faculty.faculty_name,' / ',speciality.speciality_name) as spec_full_name")] );
        
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
            'group_id' => $this->group_id,
            'id_speciality' => $this->id_speciality,
            'inflow_year' => $this->inflow_year,
            'parent_group' => $this->parent_group,
        ]);
        
        if (strlen($this->sub_group) > 0){
          $query->andWhere("group_id in (select sg.parent_group from groups sg where "
            . "is_subgroup = 1 and sg.main_group_name like '%".str_replace(["'",'"'],["`",'`'],$this->sub_group)."%') ");
          
        }
        
        $query->andWhere("is_subgroup is null or is_subgroup = 0");
        $query->andFilterWhere(['like', 'main_group_name', $this->main_group_name]);
        $query->andFilterWhere(['like', 'CONCAT(faculty.faculty_name," / ",speciality.speciality_name)', $this->spec_full_name]);

        return $dataProvider;
    }
}
