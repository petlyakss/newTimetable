<?php

namespace app\module\handbook\models;

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
            [['teacher_name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'teacher_id' => 'Teacher ID',
            'teacher_name' => 'Teacher Name',
            'id_position' => 'Id Position',
            'id_academic_status' => 'Id Academic Status',
            'id_cathedra' => 'Id Cathedra',
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
}
