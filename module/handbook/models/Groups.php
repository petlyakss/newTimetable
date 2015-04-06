<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property integer $group_id
 * @property string $main_group_name
 * @property integer $is_subgroup
 * @property integer $id_speciality
 * @property integer $inflow_year
 * @property integer $parent_group
 * @property integer $number_of_students
 * @property integer $id_okr
 * @property integer $id_edebo
 *
 * @property DisciplineDistribution[] $disciplineDistributions
 * @property Okr $idOkr
 * @property Speciality $idSpeciality
 */
class Groups extends \yii\db\ActiveRecord
{
    public $tmp_okr;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_group_name', 'is_subgroup', 'id_speciality', 'inflow_year', 'parent_group', 'number_of_students', 'id_okr', 'id_edebo'], 'required'],
            [['is_subgroup', 'id_speciality', 'inflow_year', 'parent_group', 'number_of_students', 'id_okr', 'id_edebo'], 'integer'],
            [['main_group_name'], 'string', 'max' => 50],
            [['tmp_okr'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'ID групи',
            'main_group_name' => 'Група',
            'is_subgroup' => 'Is Subgroup',
            'id_speciality' => 'Спеціальність',
            'inflow_year' => 'Рік вступу',
            'parent_group' => 'Parent Group',
            'number_of_students' => 'Кулькість студентів',
            'id_okr' => 'ОКР',
            'id_edebo' => 'ID ЄДЕБО',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplineDistributions()
    {
        return $this->hasMany(DisciplineDistribution::className(), ['id_group' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOkr()
    {
        return $this->hasOne(Okr::className(), ['okr_id' => 'id_okr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(Speciality::className(), ['speciality_id' => 'id_speciality']);
    }
    public function getSubGroups(){
        return $this->findAll(["parent_group"=>$this->group_id,"is_subgroup"=>1]);
    }
}
