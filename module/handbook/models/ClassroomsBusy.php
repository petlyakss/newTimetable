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
 *
 * @property LessonTime $lesson0
 * @property Classrooms $idClassroom
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
            [['id_classroom', 'day'], 'required'],
            [['lesson'], 'integer'],
            [['day', 'lesson', 'id_classroom'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cb_id' => 'ID',
            'id_classroom' => 'Аудиторія',
            'day' => 'Дата',
            'lesson' => 'Пара',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLesson0()
    {
        return $this->hasOne(LessonTime::className(), ['lesson_time_id' => 'lesson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassroom()
    {
        return $this->hasOne(ClassRooms::className(), ['classrooms_id' => 'id_classroom']);
    }
}
