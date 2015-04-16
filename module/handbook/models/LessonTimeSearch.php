<?php

namespace app\module\handbook\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\handbook\models\LessonTime;

/**
 * LessonTimeSearch represents the model behind the search form about `app\module\handbook\models\LessonTime`.
 */
class LessonTimeSearch extends LessonTime
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lesson_time_id'], 'integer'],
            [['lesson_time_name', 'begin_time', 'end_time'], 'safe'],
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
        $query = LessonTime::find();

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
            'lesson_time_id' => $this->lesson_time_id,
        ]);

        $query->andFilterWhere(['like', 'lesson_time_name', $this->lesson_time_name])
            ->andFilterWhere(['like', 'begin_time', $this->begin_time])
            ->andFilterWhere(['like', 'end_time', $this->end_time]);

        return $dataProvider;
    }
}
