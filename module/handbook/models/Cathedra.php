<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "cathedra".
 *
 * @property integer $cathedra_id
 * @property string $cathedra_name
 * @property integer $id_edbo
 * @property integer $id_deanery
 * @property integer $id_faculty
 *
 * @property Faculty $idFaculty
 */
class Cathedra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cathedra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cathedra_name', 'id_edbo', 'id_deanery', 'id_faculty'], 'required'],
            [['id_edbo', 'id_deanery', 'id_faculty'], 'integer'],
            [['cathedra_name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cathedra_id' => 'Cathedra ID',
            'cathedra_name' => 'Кафедра',
            'id_edbo' => 'Id ЄДЕБО',
            'id_deanery' => 'Id деканат',
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
}
