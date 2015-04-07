<?php

namespace app\module\handbook\models;

use Yii;
use app\module\handbook\models\SpecClasses;
use app\module\handbook\models\ClassType;

/**
 * This is the model class for table "classrooms".
 *
 * @property integer $classrooms_id
 * @property string $classrooms_number
 * @property integer $id_housing
 * @property integer $seats
 * @property integer $comp_number
 * @property string $options
 * @property integer $is_public
 *
 * @property ClassType[] $classTypes
 * @property Housing $idHousing
 */
class Classrooms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classrooms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classrooms_number', 'id_housing', 'seats', 'comp_number', 'is_public','options'], 'required'],
            [['id_housing', 'seats', 'comp_number', 'is_public'], 'integer'],
            [['classrooms_number'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'classrooms_id' => 'ID аудиторії',
            'classrooms_number' => 'Аудиторія №',
            'id_housing' => 'Корпус',
            'seats' => 'Місць для сидіння',
            'comp_number' => 'Кількість комп\'ютерів',
            'options' => 'Options',
            'is_public' => 'Інші дисципліни',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassTypes()
    {
        return $this->hasMany(ClassType::className(), ['classroom_id' => 'classrooms_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHousing()
    {
        return $this->hasOne(Housing::className(), ['housing_id' => 'id_housing']);
    }
}
