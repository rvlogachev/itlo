<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property string $key
 * @property string $title
 * @property int $status
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'title'], 'required'],
            [['status'], 'integer'],
            [['key'], 'string', 'max' => 32],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Ключ',
            'title' => 'Название',
            'status' => 'Статус',
        ];
    }
}
