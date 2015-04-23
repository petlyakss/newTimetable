<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "discipline".
 *
 * @property integer $discipline_id
 * @property string $discipline_name
 *
 * @property DisciplineDistribution[] $disciplineDistributions
 */
class DisciplineList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discipline';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discipline_name'], 'required'],
            [['discipline_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'discipline_id' => 'ID дисципліни',
            'discipline_name' => 'Дисципліна',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplineDistributions()
    {
        return $this->hasMany(DisciplineDistribution::className(), ['id_discipline' => 'discipline_id']);
    }
}
