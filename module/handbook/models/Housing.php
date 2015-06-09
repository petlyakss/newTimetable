<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "housing".
 *
 * @property integer $housing_id
 * @property string $name
 *
 * @property ClassRooms[] $classrooms
 */
class Housing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'housing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'housing_id' => 'Housing ID',
            'name' => 'Корпус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassRooms()
    {
        return $this->hasMany(ClassRooms::className(), ['id_housing' => 'housing_id']);
    }
}
