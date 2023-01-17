<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_telegram_update`.
 */
class m180511_171808_create_bot_telegram_update_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE=InnoDB';
        }
        $this->createTable('bot_telegram_update', [
            'id'=> "bigint(20) unsigned PRIMARY KEY NOT NULL COMMENT 'Update''s unique identifier'",
            'chat_id'=>" bigint(20) DEFAULT NULL COMMENT 'Unique chat identifier'",
            'message_id'=>"bigint(20) unsigned DEFAULT NULL COMMENT 'Unique message identifier'",
            'inline_query_id'=>"bigint(20) unsigned DEFAULT NULL COMMENT 'Unique inline query identifier'",
            'chosen_inline_result_id'=>"bigint(20) unsigned DEFAULT NULL COMMENT 'Local chosen inline result identifier'",
            'callback_query_id'=> "bigint(20) unsigned DEFAULT NULL COMMENT 'Unique callback query identifier'",
            'edited_message_id'=> "bigint(20) unsigned DEFAULT NULL COMMENT 'Local edited message identifier'",
        ],$tableOptions);
        $this->createIndex('message_id','bot_telegram_update','message_id');
        $this->createIndex('inline_query_id','bot_telegram_update','inline_query_id');
        $this->createIndex('chosen_inline_result_id','bot_telegram_update','chosen_inline_result_id');
        $this->createIndex('callback_query_id','bot_telegram_update','callback_query_id');
        $this->createIndex('edited_message_id','bot_telegram_update','edited_message_id');
        $this->addForeignKey('telegram_update_ibfk_1','bot_telegram_update',['chat_id', 'message_id'],'bot_message',['chat_id', 'id'],'CASCADE');
        $this->addForeignKey('telegram_update_ibfk_2','bot_telegram_update','inline_query_id','bot_inline_query','id',"CASCADE");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('telegram_update_ibfk_2','bot_telegram_update');
        $this->dropForeignKey('telegram_update_ibfk_1','bot_telegram_update');
        $this->dropIndex('edited_message_id','bot_telegram_update');
        $this->dropIndex('callback_query_id','bot_telegram_update');
        $this->dropIndex('chosen_inline_result_id','bot_telegram_update');
        $this->dropIndex('inline_query_id','bot_telegram_update');
        $this->dropIndex('message_id','bot_telegram_update');
        $this->dropTable('bot_telegram_update');
    }
}
