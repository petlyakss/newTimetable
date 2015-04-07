<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "teachers_other_cathedra".
 *
 * @property integer $id_teacher
 * @property integer $id_cathedra
 *
 * @property Cathedra $idCathedra
 * @property Teachers $idTeacher
 */
class TeachersOtherCathedra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teachers_other_cathedra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_teacher', 'id_cathedra'], 'required'],
            [['id_teacher', 'id_cathedra'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_teacher' => 'Id Teacher',
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
    public function getIdTeacher()
    {
        return $this->hasOne(Teachers::className(), ['teacher_id' => 'id_teacher']);
    }
}
