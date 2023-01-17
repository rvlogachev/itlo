<?php

use yii\db\Migration;

/**
 * Class m190115_101657_alter_userbot
 */
class m190115_101657_alter_userbot extends Migration
{
    public function safeUp()
    {
        $res = \Yii::$app->db->createCommand("
        ALTER TABLE `bot_user`
	CHANGE COLUMN `created_at` `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Entry date creation' AFTER `username`,
	CHANGE COLUMN `updated_at` `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Entry date update' AFTER `created_at`;

        ");
        $res->query();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $res = \Yii::$app->db->createCommand("
       ALTER TABLE `bot_user`
	ALTER `created_at` DROP DEFAULT,
	ALTER `updated_at` DROP DEFAULT;
	
ALTER TABLE `bot_user`
	CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL COMMENT 'Entry date creation' AFTER `username`,
	CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL COMMENT 'Entry date update' AFTER `created_at`;

        ");
        $res->query();
    }
}
