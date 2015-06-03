<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "classrooms_busy".
 *
 * @property integer $cb_id
 * @property integer $id_classroom
 * @property string $day
 * @property integer $lesson
 */
class ClassroomsBusy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classrooms_busy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_classroom', 'day', 'lesson'], 'required'],
            [['id_classroom', 'lesson'], 'integer'],
            [['day'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cb_id' => 'Cb ID',
            'id_classroom' => 'Id Classroom',
            'day' => 'Day',
            'lesson' => 'Lesson',
        ];
    }
}
