<?php

use yii\db\Migration;

/**
 * Class m201001_072649_report
 */
class m201001_072649_report extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{


		$this->createTable('{{%med_report}}', [
			'id' => $this->primaryKey(),
			'user_id' => $this->bigInteger(),
			'doctor_id' => $this->bigInteger(),
			'conference_id' => $this->bigInteger(),
			'date_report' => $this->dateTime(),
			'data_report' => $this->json(),
			'token' => $this->string(255),
			'company_id'=>$this->bigInteger(),
			'status'=>$this->integer(),
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%med_report}}');
	}
}
