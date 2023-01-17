<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "bot_tarif".
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property string $description
 * @property double $amount
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class BotTarif extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bot_tarif';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['amount'], 'number'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['slug'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'name' => 'Name',
            'description' => 'Description',
            'amount' => 'Amount',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BotTarifQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BotTarifQuery(get_called_class());
    }
}
