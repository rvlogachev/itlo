<?php

use yii\db\Migration;

/**
 * Class m201001_070933_company
 */
class m201001_070933_company extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('{{%med_company}}', [
			'id' => $this->primaryKey(),
			'name' => $this->string(512)->notNull(),
			'forma' => $this->string(25)->notNull(),
			'address' => $this->text()->notNull(),
			'phone' => $this->string(50)->notNull(),
			'balance' => $this->integer()->defaultValue(0)->notNull(),
			'limit' => $this->integer()->defaultValue(0),
			'rate'=>$this->integer()->defaultValue(100),
			'status'=>$this->integer()->defaultValue(0),


		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%med_company}}');
	}
}
