<?php

namespace app\module\timetable\models;

use Yii;

/**
 * This is the model class for table "discipline_groups".
 *
 * @property integer $id_discipline
 * @property integer $id_group
 */
class DisciplineGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discipline_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_discipline', 'id_group'], 'required'],
            [['id_discipline', 'id_group'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_discipline' => 'Id Discipline',
            'id_group' => 'Id Group',
        ];
    }
}
