<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "webhook".
 *
 * @property integer $id
 * @property string $url
 * @property string $token
 * @property string $data
 * @property string $update_at
 * @property string $create_at
 * @property integer $status
 * @property string $platform
 */
class Webhook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'webhook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'token', 'data'], 'required'],
            [['data'], 'string'],
            [['update_at', 'create_at'], 'safe'],
            [['status'], 'integer'],
            [['url', 'token'], 'string', 'max' => 512],
            [['platform'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'token' => 'Token',
            'data' => 'Data',
            'update_at' => 'Update At',
            'create_at' => 'Create At',
            'status' => 'Status',
            'platform' => 'Platform',
        ];
    }
}
