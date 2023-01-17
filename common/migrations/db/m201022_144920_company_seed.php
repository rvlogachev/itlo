<?php

use yii\db\Migration;

/**
 * Class m201022_144920_company_seed
 */
class m201022_144920_company_seed extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->insert('{{%med_company}}', [
			'id' => 1,
			'name' =>'Альфа Образование',
			'forma' => 'OOO',
			'address' => 'г. Москва. пр. Волгоргадский, д. 32',
			'phone' => '+7(465) 789-89-89',
			'status'=>1,
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->delete('{{%med_company}}', [
			'id' => [1]
		]);
	}
}
