<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "bot_settings".
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $key
 * @property string $reqest
 */
class BotSettings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bot_settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'group_id','key'], 'required'],
            [['group_id' ], 'integer'],
            [['key','reqest'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',

            'key' => 'key',
        ];
    }

    /**
     * @inheritdoc
     * @return BotSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BotSettingsQuery(get_called_class());
    }
}
