<?php

use yii\db\Migration;

/**
 * Class m201016_112823_seed_doctor
 */
class m201016_112823_seed_doctor extends Migration
{

	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->insert('{{%med_doctors}}', [
			'user_id' => 2,
			'signature_hash' => '1f30cebbd633e5c33fa34d88450c4675',
			'fio' => 'Иванов Иван Петрович',
			'phone' => '+7(925) 000-00-00',
			'email' => 'ivanov@ivanov.ru',

		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->delete('{{%med_doctors}}', [
			'user_id' => [1]
		]);
	}
}
