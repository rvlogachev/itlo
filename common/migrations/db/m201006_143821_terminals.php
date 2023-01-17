<?php

use yii\db\Migration;

/**
 * Class m201006_143821_terminals
 */
class m201006_143821_terminals extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{


		$this->createTable('{{%med_terminals}}', [
			'id' => $this->primaryKey(),
			'terminal_id' => $this->string()->notNull(),
			'adderss' => $this->text(),
			'fio' => $this->string(500),
			'position' => $this->string(),
			'phone' => $this->string(255),
			'company_id' => $this->bigInteger(),

		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%med_terminals}}');
	}
}
