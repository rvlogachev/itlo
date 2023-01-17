<?php

use yii\db\Migration;

/**
 * Class m190115_090351_buttons_to_user
 */
class m190115_090351_buttons_to_user extends Migration
{
    public function safeUp()
    {
        $res = \Yii::$app->db->createCommand("
         CREATE TABLE `bot_buttons_to_user` (
            `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД',
            `buttons_id` INT(11) NULL DEFAULT NULL COMMENT 'ИД кнопки',
            `user_id` INT(11) NULL DEFAULT NULL COMMENT 'ИД пользователя',
            `status` INT(11) NULL DEFAULT NULL COMMENT 'Статус',
            `key` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Ключ' COLLATE 'utf8mb4_unicode_ci',
            `platform` ENUM('telegram','vk','facebook','viber','whatsapp') NULL DEFAULT 'telegram' COLLATE 'utf8mb4_unicode_ci',
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

        $this->dropTable('bot_buttons_to_user');
    }



}
