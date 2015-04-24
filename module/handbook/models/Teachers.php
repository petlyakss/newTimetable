<?php

namespace app\module\handbook\models;
use app\module\handbook\models\TeachersOtherCathedra;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property integer $teacher_id
 * @property string $teacher_name
 * @property integer $id_position
 * @property integer $id_academic_status
 * @property integer $id_cathedra
 *
 * @property Cathedra $idCathedra
 * @property TeachersAcademicStatus $idAcademicStatus
 * @property TeachersPosition $idPosition
 */
class Teachers extends \yii\db\ActiveRecord
{
    public $teacher_other_cathedra;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_name', 'id_position', 'id_academic_status', 'id_cathedra'], 'required'],
            [['id_position', 'id_academic_status', 'id_cathedra'], 'integer'],
            [['teacher_name'], 'string', 'max' => 150],
            [['teacher_other_cathedra'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'teacher_id' => 'ID викладача',
            'teacher_name' => 'П.І.Б.',
            'id_position' => 'Посада',
            'id_academic_status' => 'Науковий ступінь',
            'id_cathedra' => 'Кафедра',
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
    public function getAcademicStatus()
    {
        return $this->hasOne(TeachersAcademicStatus::className(), ['academic_status_id' => 'id_academic_status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(TeachersPosition::className(), ['position_id' => 'id_position']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOtherCathedra()
    {
       return $this->hasMany(TeachersOtherCathedra::className(), ['id_teacher' => 'teacher_id']);
    }
}   
