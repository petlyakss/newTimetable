<?php

namespace app\module\handbook\models;

use Yii;
use yii\helpers\Html;
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
 *
 * @property ClassType[] $classTypes
 * @property Housing $idHousing
 */
class ClassRooms extends \yii\db\ActiveRecord
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
            [['classrooms_number', 'id_housing', 'seats', 'comp_number', 'options'], 'required'],
            [['id_housing', 'seats', 'comp_number'], 'integer'],
            [['classrooms_number'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'classrooms_id' => 'ID',
            'classrooms_number' => 'Аудиторія №',
            'id_housing' => 'Корпус',
            'seats' => 'Кількість місць',
            'comp_number' => 'Кількість комп\'ютерів',
            'options' => 'Options',
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
