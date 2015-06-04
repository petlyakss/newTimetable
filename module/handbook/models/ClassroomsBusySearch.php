<?php

namespace app\module\handbook\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\handbook\models\ClassroomsBusy;
use app\module\handbook\models\LessonTime;

/**
 * ClassroomsBusySearch represents the model behind the search form about `app\module\handbook\models\ClassroomsBusy`.
 */
class ClassroomsBusySearch extends ClassroomsBusy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cb_id'], 'integer'],
            [['day', 'lesson', 'id_classroom'], 'safe'],
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
        $query = ClassroomsBusy::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->joinWith('lesson0');
        $query->joinWith('classroom');
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'cb_id' => $this->cb_id,
            //'id_classroom' => $this->id_classroom,
            'day' => $this->day,
            //'lesson' => $this->lesson,
        ]);
        $query->andFilterWhere(['like', 'lesson_time_name', $this->lesson])
              ->andFilterWhere(['like', 'classrooms_number', $this->id_classroom]);
        return $dataProvider;
    }
}
