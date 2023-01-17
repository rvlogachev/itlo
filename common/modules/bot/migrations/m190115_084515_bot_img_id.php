<?php

use yii\db\Migration;

/**
 * Class m190115_084515_bot_img_id
 */
class m190115_084515_bot_img_id extends Migration
{
    public function safeUp()
    {
        $res = \Yii::$app->db->createCommand("
         CREATE TABLE `bot_img_id` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `vk_id` INT(11) NOT NULL DEFAULT '0',
            `user_id` INT(11) NULL DEFAULT NULL COMMENT 'в боте ',
            `user_backend_id` INT(11) NULL DEFAULT NULL,
            `order` INT(11) NULL DEFAULT '0',
            `img_id` INT(11) NULL DEFAULT NULL,
            `album_id` INT(11) NULL DEFAULT NULL,
            `owner_id` INT(11) NULL DEFAULT NULL,
            `sizes` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
            `prim` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
            `path` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
            `base_url` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
            `type` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
            `size` INT(11) NULL DEFAULT NULL,
            `name` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
            `created_at` INT(11) NULL DEFAULT NULL,
            PRIMARY KEY (`id`),
            INDEX `FK_bot_img_id_bot_message_image` (`img_id`),
            CONSTRAINT `FK_bot_img_id_bot_message_image` FOREIGN KEY (`img_id`) REFERENCES `bot_message_image` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
        )
        COLLATE='utf8mb4_unicode_ci'
        ENGINE=InnoDB 
        ; ");
        $res->query();

         }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_bot_img_id_bot_message_image','bot_img_id');
         $this->dropIndex('FK_bot_img_id_bot_message_image','bot_img_id');
        $this->dropTable('bot_img_id');
    }
}
