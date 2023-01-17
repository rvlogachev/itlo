<?php

use yii\db\Migration;

/**
 * Class m190115_103818_messagesvk
 */
class m190115_103818_messagesvk extends Migration
{
    public function safeUp()
    {
        $res = \Yii::$app->db->createCommand("
               CREATE TABLE `bot_message_vk` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `date` BIGINT(20) NULL DEFAULT NULL,
            `type` TEXT NULL,
            `from_id` BIGINT(20) NULL DEFAULT NULL,
            `random_id` BIGINT(20) NULL DEFAULT NULL,
            `message_id` BIGINT(20) NULL DEFAULT NULL,
            `out` INT(11) NULL DEFAULT NULL,
            `peer_id` BIGINT(20) NULL DEFAULT NULL,
            `text` TEXT NULL,
            `conversation_message_id` INT(11) NULL DEFAULT NULL,
            `fwd_messages` TEXT NULL,
            `important` INT(11) NULL DEFAULT NULL,
            `attachments` TEXT NULL,
            `payload` TEXT NULL,
            `is_hidden` INT(11) NULL DEFAULT NULL,
            `group_id` BIGINT(20) NULL DEFAULT NULL,
            `response` BIGINT(20) NULL DEFAULT NULL,
            `keyboard` TEXT NULL,
            `inout` ENUM('input','output') NULL DEFAULT NULL,
            PRIMARY KEY (`id`)
        )
        COLLATE='utf8mb4_general_ci'
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
        $res = \Yii::$app->db->createCommand("
      DROP TABLE bot_message_vk;
        ");
        $res->query();
    }
}
