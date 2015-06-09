<?php

namespace app\module\handbook\models;
use app\module\handbook\models\Cathedra;

use Yii;

/**
 * This is the model class for table "discipline_distribution".
 *
 * @property integer $discipline_distribution_id
 * @property integer $id_discipline
 * @property integer $id_edbo
 * @property integer $id_deanery
 * @property integer $id_cathedra
 * @property integer $id_lessons_type
 * @property integer $id_group
 * @property integer $course
 * @property integer $hours
 * @property integer $semestr_hours
 * @property integer $id_classroom
 *
 * @property Discipline $idDiscipline
 * @property Discipline[] $disciplines
 * @property LessonsType $idLessonsType
 * @property DisciplineGroups[] $disciplineGroups
 * @property Lessons[] $lessons
 */
class Discipline extends \yii\db\ActiveRecord
{
    public $mgroups;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discipline_distribution';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_edbo', 'id_deanery', 'id_cathedra', 'id_lessons_type', 'course', 'hours', 'semestr_hours'], 'required'],
            [['id_edbo', 'id_deanery', 'id_group', 'course', 'hours', 'semestr_hours', 'id_classroom'], 'integer'],
            [['id_discipline','mgroups', 'id_cathedra',  'id_lessons_type', 'id_classroom'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'discipline_distribution_id' => 'ID дисципліни',
            'id_discipline' => 'Дисципліна',
            'id_edbo' => 'ID ЄДЕБО',
            'id_deanery' => 'ID деканат',
            'id_cathedra' => 'Кафедра',
            'id_lessons_type' => 'Тип заняття',
            'id_group' => 'Групи',
            'course' => 'Курс',
            'hours' => 'Годин за 2 тижні',
            'semestr_hours' => 'Годин у семестр',
            'id_classroom' => 'Id Classroom',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDiscipline()
    {
        return $this->hasOne(Discipline::className(), ['discipline_id' => 'id_discipline']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCathedra()
    {
        return $this->hasOne(Cathedra::className(), ['cathedra_id' => 'id_cathedra']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplines()
    {
        return $this->hasMany(Discipline::className(), ['id_discipline' => 'discipline_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessonsType()
    {
        return $this->hasOne(LessonsType::className(), ['id' => 'id_lessons_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplineGroups()
    {
        return $this->hasMany(DisciplineGroups::className(), ['id_discipline' => 'discipline_distribution_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lessons::className(), ['id_discipline' => 'discipline_distribution_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['group_id' => 'id_group']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplineName()
    {
        return $this->hasOne(DisciplineList::className(), ['discipline_id' => 'id_discipline']);
    }
}
