<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_inline_query`.
 */
class m180511_163750_create_bot_inline_query_table extends Migration
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
        $this->createTable('bot_inline_query', [
            'id'=>"bigint(20) unsigned NOT NULL PRIMARY KEY COMMENT 'Unique identifier for this query'",
            'user_id'=>"bigint(20) DEFAULT NULL COMMENT 'Unique user identifier'",
            'location'=> "char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Location of the user'",
            'query'=> "text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'Text of the query'",
            'offset'=> "char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Offset of the result'",
            'created_at'=> "timestamp NULL DEFAULT NULL COMMENT 'Entry date creation'",
        ],$tableOptions);
        $this->createIndex('user_id','bot_inline_query','user_id');

        $this->addForeignKey('inline_query_ibfk_1','bot_inline_query','user_id','bot_user','id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('inline_query_ibfk_1','bot_inline_query');
        $this->dropIndex('user_id','bot_inline_query');
        $this->dropTable('bot_inline_query');
    }
}
