<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_edited_message`.
 */
class m180511_194514_create_bot_edited_message_table extends Migration
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
        $this->createTable('bot_edited_message', [
            'id'=>"bigint(20) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Unique identifier for this entry'",
            "chat_id"=>"bigint(20) DEFAULT NULL COMMENT 'Unique chat identifier'",
            "message_id"=>"bigint(20) unsigned DEFAULT NULL COMMENT 'Unique message identifier'",
            'user_id'=>"bigint(20) DEFAULT NULL COMMENT 'Unique user identifier'",
            'edit_date'=>"timestamp NULL DEFAULT NULL COMMENT 'Date the message was edited in timestamp format'",
            'text'=>"text COLLATE utf8mb4_unicode_520_ci COMMENT 'For text messages, the actual UTF-8 text of the message max message length 4096 char utf8'",
            'entities'=>"text COLLATE utf8mb4_unicode_520_ci COMMENT 'For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text'",
            'caption'=>"text COLLATE utf8mb4_unicode_520_ci COMMENT 'For message with caption, the actual UTF-8 text of the caption'",
        ],$tableOptions);

        $this->createIndex('chat_id','bot_edited_message','chat_id');

        $this->createIndex('message_id','bot_edited_message','message_id');

        $this->createIndex('user_id','bot_edited_message','user_id');

        $this->createIndex('chat_id_2','bot_edited_message',['chat_id','message_id']);

        $this->addForeignKey('edited_message_ibfk_1','bot_edited_message','chat_id','bot_chat','id');

        $this->addForeignKey('edited_message_ibfk_2','bot_edited_message',['chat_id', 'message_id'],'bot_message',['chat_id', 'id'],'CASCADE');

        $this->addForeignKey('edited_message_ibfk_3','bot_edited_message','user_id','bot_user','id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('edited_message_ibfk_3','bot_edited_message');
        $this->dropForeignKey('edited_message_ibfk_2','bot_edited_message');
        $this->dropForeignKey('edited_message_ibfk_1','bot_edited_message');
        $this->dropIndex('message_id','bot_edited_message');
        $this->dropIndex('user_id','bot_edited_message');
        $this->dropIndex('chat_id_2','bot_edited_message');
        $this->dropTable('bot_edited_message');
    }
}
