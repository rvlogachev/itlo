<?php

use yii\db\Migration;

/**
 * Class m201016_073928_seed_questions
 */
class m201016_073928_seed_questions extends Migration
{

	/**
	 * @return bool|void
	 * @throws \yii\base\Exception
	 */
	public function safeUp()
	{

		$this->insert('{{%questions}}', [
			'text' => 'Вы сегодня выспались?',
			'answer1' => 'Да',
			'answer2' => 'Нет',
			'priority' => 1,
			'success_answer' => 'Да',
		]);
		$this->insert('{{%questions}}', [
			'text' => 'Есть ли у вас какие-либо жалобы на здоровье или что-то,что вас беспокоит?',
			'answer1' => 'Да',
			'answer2' => 'Нет',
			'priority' => 1,
			'success_answer' => 'Нет',
		]);
		$this->insert('{{%questions}}', [
			'text' => 'Употребляли ли вы накануне алкоголь?',
			'answer1' => 'Да',
			'answer2' => 'Нет',
			'priority' => 1,
			'success_answer' => 'Нет',
		]);



	}

	/**
	 * @return bool|void
	 */
	public function safeDown()
	{

		$this->delete('{{%questions}}', [
			'user_id' => [1]
		]);


	}

}
