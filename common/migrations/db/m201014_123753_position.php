<?php

use yii\db\Migration;

/**
 * Class m201014_123753_position
 */
class m201014_123753_position extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{


		$this->createTable('{{%med_position}}', [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull(),
			'status' => $this->smallInteger()->notNull()->defaultValue(1),

		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%med_position}}');
	}
}
