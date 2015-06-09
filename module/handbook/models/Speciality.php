<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "speciality".
 *
 * @property integer $speciality_id
 * @property string $speciality_name
 * @property integer $id_edebo
 * @property integer $id_cathedra
 * @property integer $id_faculty
 *
 * @property Faculty $idFaculty
 * @property Cathedra $idCathedra
 */
class Speciality extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'speciality';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['speciality_name', 'id_edebo', 'id_faculty'], 'required'],
            [['id_edebo', 'id_cathedra'], 'integer'],
            [['speciality_name'], 'string', 'max' => 100],
            [[ 'id_cathedra','id_faculty'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'speciality_id' => 'Speciality ID',
            'speciality_name' => 'Спеціальність',
            'id_edebo' => 'ID ЄДЕБО',
            'id_cathedra' => 'Кафедра',
            'id_faculty' => 'Факультет',
        ];
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
    public function getCathedra()
    {
        return $this->hasOne(Cathedra::className(), ['cathedra_id' => 'id_cathedra']);
    }
}
