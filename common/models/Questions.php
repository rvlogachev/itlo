<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property int $id
 * @property string $text
 * @property string $answer1
 * @property string $answer2
 * @property string $answer3
 * @property string $answer4
 * @property string $answer5
 * @property int $priority
 * @property string $success_answer
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'answer1',   'priority', 'success_answer'], 'required'],
            [['text'], 'string'],
            [['priority'], 'integer'],
	        ['priority', 'default', 'value' => '0'],
            [['answer1', 'answer2', 'answer3', 'answer4', 'answer5', 'success_answer'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Вопрос',
            'answer1' => 'Ответ 1',
            'answer2' => 'Ответ 2',
            'answer3' => 'Ответ 3',
            'answer4' => 'Ответ 4',
            'answer5' => 'Ответ 5',
            'priority' => 'Приоритет',
            'success_answer' => 'Верный ответ',
        ];
    }

    /**
     * {@inheritdoc}
     * @return QuestionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuestionsQuery(get_called_class());
    }
}
