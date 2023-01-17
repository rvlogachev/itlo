<?php

use yii\db\Migration;

/**
 * Class m201022_104815_device_seed
 */
class m201022_104815_device_seed extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->insert('{{%device}}', [
			'id' => 1,
			'key' => 'alco',
			'title' => 'Алкометр',
			'status' => 1,
		]);
		$this->insert('{{%device}}', [
			'id' => 2,
			'key' => 'temp',
			'title' => 'Термометр',
			'status' => 1,
		]);
		$this->insert('{{%device}}', [
			'id' => 3,
			'key' => 'bpp',
			'title' => 'Тонометр',
			'status' => 1,
		]);

	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->delete('{{%device}}', [
			'id' => [1,2,3]
		]);
	}

}
