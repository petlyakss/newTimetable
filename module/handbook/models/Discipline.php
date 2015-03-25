<?php

namespace app\module\handbook\models;
use app\module\handbook\models\DisciplineList;

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
 *
 * @property Cathedra $idCathedra
 * @property Discipline $idDiscipline
 * @property Discipline[] $disciplines
 * @property Groups $idGroup
 * @property LessonsType $idLessonsType
 */
class Discipline extends \yii\db\ActiveRecord
{
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
            [['id_discipline', 'id_edbo', 'id_deanery', 'id_cathedra', 'id_lessons_type', 'id_group', 'course', 'hours', 'semestr_hours'], 'required'],
            [['id_discipline', 'id_edbo', 'id_deanery', 'id_cathedra', 'id_lessons_type', 'id_group', 'course', 'hours', 'semestr_hours'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'discipline_distribution_id' => 'ID дисципліни',
            'id_discipline' => 'Назва дисципліни',
            'id_edbo' => 'ID ЄДЕБО',
            'id_deanery' => 'ID деканат',
            'id_cathedra' => 'Кафедра',
            'id_lessons_type' => 'Тип занять',
            'id_group' => 'Група',
            'course' => 'Курс',
            'hours' => 'Годин за 2 тижні',
            'semestr_hours' => 'Годин у семестр',
        ];
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
    public function getDisciplineName()
    {
        return $this->hasOne(DisciplineList::className(), ['discipline_id' => 'id_discipline']);
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
    public function getDisciplines()
    {
        return $this->hasMany(Discipline::className(), ['id_discipline' => 'discipline_id']);
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
    public function getLessonsType()
    {
        return $this->hasOne(LessonsType::className(), ['id' => 'id_lessons_type']);
    }
}
