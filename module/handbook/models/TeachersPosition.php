<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "teachers_position".
 *
 * @property integer $position_id
 * @property string $position_name
 *
 * @property Teachers[] $teachers
 */
class TeachersPosition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teachers_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position_name'], 'required'],
            [['position_name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'position_id' => 'Position ID',
            'position_name' => 'Position Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teachers::className(), ['id_position' => 'position_id']);
    }
}
