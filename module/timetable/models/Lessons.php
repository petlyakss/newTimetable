<?php

namespace app\module\timetable\models;

use Yii;

/**
 * This is the model class for table "lessons".
 *
 * @property integer $lesson_id
 * @property integer $id_group
 * @property integer $id_faculty
 * @property integer $id_speciality
 * @property integer $course
 * @property integer $semester
 * @property integer $id_okr
 * @property integer $is_numerator
 * @property integer $id_discipline
 * @property integer $id_teacher
 * @property integer $id_classroom
 * @property integer $day
 * @property integer $is_holiday
 * @property integer $all_group
 * @property integer $all_speciality
 * @property integer $lesson_number
 *
 * @property Classrooms $idClassroom
 * @property Discipline $idDiscipline
 * @property Faculty $idFaculty
 * @property Groups $idGroup
 * @property Okr $idOkr
 * @property Speciality $idSpeciality
 * @property Teachers $idTeacher
 */
class Lessons extends \yii\db\ActiveRecord
{
    public $semestr;
    public $course;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lessons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_group', 'id_faculty', 'id_speciality', 'course', 'semester', 'id_okr', 'is_numerator', 'id_discipline', 'id_teacher', 'id_classroom', 'day', 'is_holiday', 'all_group', 'all_speciality', 'lesson_number','semestr','course'], 'required'],
            [['id_group', 'id_faculty', 'id_speciality', 'course', 'semester', 'id_okr', 'is_numerator', 'id_discipline', 'id_teacher', 'id_classroom', 'day', 'is_holiday', 'all_group', 'all_speciality', 'lesson_number','semestr','course'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lesson_id' => 'Lesson ID',
            'id_group' => 'Id Group',
            'id_faculty' => 'Id Faculty',
            'id_speciality' => 'Id Speciality',
            'course' => 'Course',
            'semester' => 'Semester',
            'id_okr' => 'Id Okr',
            'is_numerator' => 'Is Numerator',
            'id_discipline' => 'Id Discipline',
            'id_teacher' => 'Id Teacher',
            'id_classroom' => 'Id Classroom',
            'day' => 'Day',
            'is_holiday' => 'Is Holiday',
            'all_group' => 'All Group',
            'all_speciality' => 'All Speciality',
            'lesson_number' => 'Lesson Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassroom()
    {
        return $this->hasOne(Classrooms::className(), ['classrooms_id' => 'id_classroom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscipline()
    {
        return $this->hasOne(Discipline::className(), ['discipline_id' => 'id_discipline']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['faculty_id' => 'id_faculty']);
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
    public function getOkr()
    {
        return $this->hasOne(Okr::className(), ['okr_id' => 'id_okr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(Speciality::className(), ['speciality_id' => 'id_speciality']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teachers::className(), ['teacher_id' => 'id_teacher']);
    }
}
