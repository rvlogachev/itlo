<?php

use yii\db\Migration;

/**
 * Class m190115_095829_settings
 */
class m190115_095829_settings extends Migration
{
    public function safeUp()
    {
        $res = \Yii::$app->db->createCommand("
            CREATE TABLE `bot_settings` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `key` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
            `reqest` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
            `group_id` BIGINT(20) NULL DEFAULT NULL,
            `response` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
            PRIMARY KEY (`id`)
            )
            COLLATE='utf8mb4_unicode_ci'
            ENGINE=InnoDB 
            ;
        ");
        $res->query();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('bot_settings');
    }
}
