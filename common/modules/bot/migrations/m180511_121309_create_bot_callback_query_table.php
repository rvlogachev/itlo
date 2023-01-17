<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_callback_query`.
 */
class m180511_121309_create_bot_callback_query_table extends Migration
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
        $this->createTable('bot_callback_query', [
            'id' => "bigint(20) unsigned NOT NULL PRIMARY KEY  COMMENT  'Unique identifier for this query'",
            'user_id'=>"bigint(20) DEFAULT NULL COMMENT 'Unique user identifier'",
            'chat_id'=>"bigint(20) DEFAULT NULL COMMENT 'Unique chat identifier'",
            'message_id'=>"bigint(20) unsigned DEFAULT NULL COMMENT 'Unique message identifier'",
            'inline_message_id'=>" char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Identifier of the message sent via the bot in inline mode, that originated the query'",
            'data'=>"char(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Data associated with the callback button'",
            'created_at'=>"timestamp NULL DEFAULT NULL COMMENT 'Entry date creation'"
        ],$tableOptions);

        $this->createIndex('user_id','bot_callback_query','user_id');
        $this->createIndex('message_id','bot_callback_query','message_id');
        $this->createIndex('chat_id','bot_callback_query','chat_id');
        $this->createIndex('chat_id_2','bot_callback_query',['chat_id','message_id']);
        $this->addForeignKey('callback_query_ibfk_1','bot_callback_query','user_id','bot_user','id','CASCADE');
        $this->addForeignKey('callback_query_ibfk_2','bot_callback_query',['chat_id','message_id'],'bot_message',['chat_id', 'id'],'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('callback_query_ibfk_1','bot_callback_query');
        $this->dropForeignKey('callback_query_ibfk_2','bot_callback_query');
        $this->dropIndex('chat_id_2','bot_callback_query');
        $this->dropIndex('chat_id','bot_callback_query');
        $this->dropIndex('message_id','bot_callback_query');
        $this->dropIndex('user_id','bot_callback_query');
        $this->dropTable('bot_callback_query');
    }
}
