<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "lesson_time".
 *
 * @property integer $lesson_time_id
 * @property string $lesson_time_name
 * @property string $begin_time
 * @property string $end_time
 */
class LessonTime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lesson_time';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lesson_time_name', 'begin_time', 'end_time'], 'required'],
            [['lesson_time_name'], 'string', 'max' => 20],
            [['begin_time', 'end_time'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lesson_time_id' => 'Lesson Time ID',
            'lesson_time_name' => 'Пара',
            'begin_time' => 'Begin Time',
            'end_time' => 'End Time',
        ];
    }
}
