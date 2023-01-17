<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_conversation`.
 */
class m180511_191502_create_bot_conversation_table extends Migration
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

        $this->createTable('bot_conversation', [
            'id'=>"bigint(20) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Unique identifier for this entry'",
            'user_id'=>"bigint(20) DEFAULT NULL COMMENT 'Unique user identifier'",
            'chat_id'=>"bigint(20) DEFAULT NULL COMMENT 'Unique user or chat identifier'",
            'status'=>"enum('active','cancelled','stopped') COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'active' COMMENT 'Conversation state'",
            'command'=>"varchar(160) COLLATE utf8mb4_unicode_520_ci DEFAULT '' COMMENT 'Default command to execute'",
            'notes'=>"varchar(1000) COLLATE utf8mb4_unicode_520_ci DEFAULT 'NULL' COMMENT 'Data stored from command'",
            "created_at"=>"timestamp NULL DEFAULT NULL COMMENT 'Entry date creation'",
            "updated_at"=>"timestamp NULL DEFAULT NULL COMMENT 'Entry date update'",
        ],$tableOptions);

        $this->createIndex('user_id','bot_conversation','user_id');

        $this->createIndex('chat_id','bot_conversation','chat_id');

        $this->createIndex('status','bot_conversation','status');

        $this->addForeignKey('conversation_ibfk_1','bot_conversation','user_id','bot_user','id','CASCADE');

        $this->addForeignKey('conversation_ibfk_2','bot_conversation','chat_id','bot_chat','id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('conversation_ibfk_2','bot_conversation');
        $this->dropForeignKey('conversation_ibfk_1','bot_conversation');
        $this->dropIndex('status','bot_conversation');
        $this->dropIndex('chat_id','bot_conversation');
        $this->dropIndex('user_id','bot_conversation');
        $this->dropTable('bot_conversation');
    }
}
