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
            [['speciality_id', 'id_edebo', 'id_cathedra', 'id_faculty'], 'integer'],
            [['speciality_name'], 'safe'],
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

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'speciality_id' => $this->speciality_id,
            'id_edebo' => $this->id_edebo,
            'id_cathedra' => $this->id_cathedra,
            'id_faculty' => $this->id_faculty,
        ]);

        $query->andFilterWhere(['like', 'speciality_name', $this->speciality_name]);

        return $dataProvider;
    }
}
