<?php

use yii\db\Migration;

/**
 * Class m201016_081234_seed_position
 */
class m201016_081234_seed_position extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->insert('{{%med_position}}', [
			'name' => 'Водитель',
			'status' => 1,
		]);
		$this->insert('{{%med_position}}', [
			'id' => 2,
			'name' =>'Доктор',
			'status'=>1,
		]);
		$this->insert('{{%med_position}}', [
			'id' => 3,
			'name' =>'Руководитель (HR)',
			'status'=>1,
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->delete('{{%med_settings}}', [
			'user_id' => [1, 2 ,3]
		]);
	}
}
