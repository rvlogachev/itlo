<?php

use yii\db\Migration;

/**
 * Class m201006_110323_balance_history
 */
class m201006_110323_balance_history extends Migration
{

	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{


		$this->createTable('{{%balance_history}}', [
			'id' => $this->primaryKey(),
			'company_id' => $this->bigInteger()->notNull(),
			'date_report' => $this->dateTime(),
			'type'=>$this->string(),
			'value'=>$this->bigInteger(),
			'old'=>$this->integer(),
			'new'=>$this->integer(),
			'reason'=>$this->text(),
			'terminal_id' => $this->bigInteger(),

		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%balance_history}}');
	}
}
