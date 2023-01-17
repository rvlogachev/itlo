<?php

use yii\db\Migration;

/**
 * Class m201001_072125_questions
 */
class m201001_072125_questions extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{



		$this->createTable('{{%questions}}', [
			'id' => $this->primaryKey(),
			'text' => $this->string()->notNull(),
			'answer1' => $this->string(250)->notNull(),
			'answer2' => $this->string(250)->notNull(),
			'answer3' => $this->string(250),
			'answer4' => $this->string(250),
			'answer5' => $this->string(255),
			'priority' => $this->string(255),
			'success_answer' => $this->string(255)->notNull(),
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%questions}}');
	}
}
