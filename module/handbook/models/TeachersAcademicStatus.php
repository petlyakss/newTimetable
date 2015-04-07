<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "teachers_academic_status".
 *
 * @property integer $academic_status_id
 * @property string $academic_status_name
 *
 * @property Teachers[] $teachers
 */
class TeachersAcademicStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teachers_academic_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['academic_status_name'], 'required'],
            [['academic_status_name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'academic_status_id' => 'Academic Status ID',
            'academic_status_name' => 'Вчене звання',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teachers::className(), ['id_academic_status' => 'academic_status_id']);
    }
}
