<?php

namespace app\module\handbook\models;

use Yii;

/**
 * This is the model class for table "okr".
 *
 * @property integer $okr_id
 * @property string $okr_name
 *
 * @property Groups[] $groups
 */
class Okr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'okr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['okr_name'], 'required'],
            [['okr_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'okr_id' => 'ID ОКР',
            'okr_name' => 'ОКР',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['id_okr' => 'okr_id']);
    }
}
