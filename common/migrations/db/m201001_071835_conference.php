<?php

use yii\db\Migration;

/**
 * Class m201001_071835_conference
 */
class m201001_071835_conference extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{



		$this->createTable('{{%med_conference}}', [
			'id' => $this->primaryKey(),
			'doctor_id' => $this->bigInteger(),
			'status' => $this->string(250)->notNull(),
			'date_conf' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP()'),
			'data_json' => $this->json(),
			'user_id' => $this->bigInteger()->notNull(),
			'frontend_peer' => $this->string(255)->notNull(),
			'report' => $this->string(255)->notNull(),
			'result' => $this->string(1024),
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%med_conference}}');
	}
}
