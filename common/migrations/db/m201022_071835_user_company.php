<?php

use yii\db\Migration;

/**
 * Class m201022_071835_user_company
 */
class m201022_071835_user_company extends Migration
{

	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('{{%user_company}}', [
			'id' => $this->primaryKey(),
			'user_id' => $this->bigInteger()->notNull(),
			'company_id' => $this->bigInteger()->notNull(),
			'status' => $this->smallInteger()->notNull()->defaultValue(0)
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%user_company}}');
	}


}
