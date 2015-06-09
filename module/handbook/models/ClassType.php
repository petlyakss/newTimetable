<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "class_type".
 *
 * @property integer $classroom_id
 * @property integer $spec_class_id
 *
 * @property SpecClasses $specClass
 * @property ClassRooms $classroom
 */
class ClassType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classroom_id', 'spec_class_id'], 'required'],
            [['spec_class_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'classroom_id' => 'Classroom ID',
            'spec_class_id' => 'Spec Class ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecClass()
    {
        return $this->hasOne(SpecClasses::className(), ['spec_class_id' => 'spec_class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassroom()
    {
        return $this->hasOne(ClassRooms::className(), ['classrooms_id' => 'classroom_id']);
    }
}
