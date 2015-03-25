<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "spec_classes".
 *
 * @property integer $spec_class_id
 * @property string $spec_class_name
 *
 * @property ClassType[] $classTypes
 */
class SpecClasses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spec_classes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['spec_class_name'], 'required'],
            [['spec_class_name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'spec_class_id' => 'Spec Class ID',
            'spec_class_name' => 'Spec Class Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassTypes()
    {
        return $this->hasMany(ClassType::className(), ['spec_class_id' => 'spec_class_id']);
    }
}
