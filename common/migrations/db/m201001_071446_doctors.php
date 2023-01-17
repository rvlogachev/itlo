<?php

use yii\db\Migration;

/**
 * Class m201001_071446_doctors
 */
class m201001_071446_doctors extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('{{%med_doctors}}', [
			'id' => $this->primaryKey(),
			'user_id' => $this->bigInteger()->notNull(),
			'signature_hash' => $this->string(250)->notNull(),
			'fio' => $this->string(255)->notNull(),
			'phone' => $this->string(50)->notNull(),
			'email' => $this->string(255)->notNull(),
			'path' => $this->string(255),
			'base_url' => $this->string(255),
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%med_doctors}}');
	}
}
