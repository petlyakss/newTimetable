<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "lessons_type".
 *
 * @property integer $id
 * @property string $lesson_type_name
 *
 * @property DisciplineDistribution[] $disciplineDistributions
 */
class LessonsType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lessons_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lesson_type_name'], 'required'],
            [['lesson_type_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lesson_type_name' => 'Тип заняття',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplineDistributions()
    {
        return $this->hasMany(DisciplineDistribution::className(), ['id_lessons_type' => 'id']);
    }
}
