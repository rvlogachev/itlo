<?php

use yii\db\Migration;

/**
 * Class m201015_073528_position_company
 */
class m201015_073528_position_company extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('{{%med_position_company}}', [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull(),
			'company_id' => $this->bigInteger()->notNull(),
			'status' => $this->smallInteger()->notNull()->defaultValue(1),
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%med_position_company}}');
	}
}
