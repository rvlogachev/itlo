<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "user_modules".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $chat_id
 * @property integer $module
 * @property integer $platform
 * @property integer $status
 * @property string $create_at
 * @property string $update_at
 */
class UserModules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_modules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'chat_id', 'module', 'platform'], 'required'],
            [['user_id', 'chat_id', 'module', 'platform', 'status'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'chat_id' => 'Chat ID',
            'module' => 'Module',
            'platform' => 'Platform',
            'status' => 'Status',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @inheritdoc
     * @return UserModulesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserModulesQuery(get_called_class());
    }
}
