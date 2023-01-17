<?php

use yii\db\Migration;

/**
 * Class m201001_072356_settings
 */
class m201001_072356_settings extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{


		$this->createTable('{{%med_settings}}', [
			'id' => $this->primaryKey(),
			'user_id' => $this->bigInteger()->notNull(),
			'reference_temp_ot' => $this->bigInteger(),
			'reference_temp_do' => $this->string(250),
			'reference_bpp_up_ot' => $this->string(250),
			'reference_bpp_up_do' => $this->string(250),
			'reference_bpp_lower_ot' => $this->string(250),
			'reference_bpp_lower_do' => $this->string(255),
			'reference_bpp_pulse_ot' => $this->string(255),
			'reference_bpp_pulse_do' => $this->string(255),
			'reference_alco_ot' => $this->string(255),
			'reference_alco_do' => $this->string(255),
			'rate'=>$this->integer(),

			'all_phone' => $this->string(20),
			'printer_count' => $this->integer(),
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%med_settings}}');
	}
}
