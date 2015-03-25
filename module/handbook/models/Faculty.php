<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "faculty".
 *
 * @property integer $faculty_id
 * @property string $faculty_name
 * @property integer $id_edbo
 * @property integer $id_deanery
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faculty_name', 'id_edbo', 'id_deanery'], 'required'],
            [['id_edbo', 'id_deanery'], 'integer'],
            [['faculty_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'faculty_id' => 'Faculty ID',
            'faculty_name' => 'Факультет',
            'id_edbo' => 'Id ЄДЕБО',
            'id_deanery' => 'Id деканат',
        ];
    }
}
