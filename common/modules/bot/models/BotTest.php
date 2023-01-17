<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "bot_test".
 *
 * @property string $id
 * @property string $question
 * @property int $number
 * @property string $answer_yes
 * @property string $answer_no
 * @property string $answer_middle
 * @property string $status Conversation state
 * @property string $created_at Entry date creation
 * @property string $updated_at Entry date update
 */
class BotTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bot_test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number'], 'integer'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['question', 'answer_yes', 'answer_no', 'answer_middle'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'number' => 'Number',
            'answer_yes' => 'Answer Yes',
            'answer_no' => 'Answer No',
            'answer_middle' => 'Answer Middle',
            'status' => 'Conversation state',
            'created_at' => 'Entry date creation',
            'updated_at' => 'Entry date update',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BotTestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BotTestQuery(get_called_class());
    }
}
