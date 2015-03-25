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
 *
 * @property DisciplineDistribution[] $disciplineDistributions
 * @property Speciality $idSpeciality
 */
class Groups extends \yii\db\ActiveRecord
{
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
            [['main_group_name', 'is_subgroup', 'id_speciality', 'inflow_year', 'parent_group'], 'required'],
            [['is_subgroup', 'id_speciality', 'inflow_year', 'parent_group'], 'integer'],
            [['main_group_name'], 'string', 'max' => 50]
        ];
    }
    


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'main_group_name' => 'Main Group Name',
            'is_subgroup' => 'Is Subgroup',
            'id_speciality' => 'Id Speciality',
            'inflow_year' => 'Inflow Year',
            'parent_group' => 'Parent Group',
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
    public function getSpeciality()
    {
        return $this->hasOne(Speciality::className(), ['speciality_id' => 'id_speciality']);
    }
    
    public function getSubGroups(){
        return $this->findAll(["parent_group"=>$this->group_id,"is_subgroup"=>1]);
    }
}
