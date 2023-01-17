<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "modules".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $desc
 * @property integer $status
 */
class Modules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title', 'desc', 'status'], 'required'],
            [['desc'], 'string'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
            'desc' => 'Desc',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return WebhookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WebhookQuery(get_called_class());
    }
}
