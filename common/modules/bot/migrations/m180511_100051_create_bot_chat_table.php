<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_chat`.
 */
class m180511_100051_create_bot_chat_table extends Migration
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
        $this->createTable('bot_chat', [
            'id' => "bigint(20) NOT NULL PRIMARY KEY COMMENT 'Unique user or chat identifier'",
            'type'=>"enum('private','group','supergroup','channel') COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'Chat type, either private, group, supergroup or channel'",
            'title'=>" char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT '' COMMENT 'Chat (group) title, is null if chat ENGINE is private'",
            'created_at'=>" timestamp NULL DEFAULT NULL COMMENT 'Entry date creation'",
            'updated_at'=> "timestamp NULL DEFAULT NULL COMMENT 'Entry date update'",
            'old_id'=>" bigint(20) DEFAULT NULL COMMENT 'Unique chat identifier, this is filled when a group is converted to a supergroup'",
        ],$tableOptions);
        $this->createIndex('old_id','bot_chat','old_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('old_id','bot_chat');
        $this->dropTable('bot_chat');
    }
}
