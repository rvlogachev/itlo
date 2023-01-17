<?php

use yii\db\Migration;

/**
 * Class m201016_095027_uiid
 */
class m201016_095027_uiid extends Migration
{


	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
//		$connection = Yii::$app->getDb();
//		$command = $connection->createCommand("CREATE DEFINER=`%`@`%` TRIGGER `insert_guid` BEFORE INSERT ON `user` FOR EACH ROW SET NEW.uid = UUID()");
//		$result = $command->queryAll();
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{

//		$connection = Yii::$app->getDb();
//		$command = $connection->createCommand("DROP TRIGGER `insert_guid`;");
//		$result = $command->queryAll();
	}
}
