<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_chosen_inline_result`.
 */
class m180511_141013_create_bot_chosen_inline_result_table extends Migration
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

        $this->createTable('bot_chosen_inline_result', [
            'id' => "bigint(20) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Unique identifier for this entry'",
            'result_id'=> "char(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Identifier for this result'",
            'user_id'=>" bigint(20) DEFAULT NULL COMMENT 'Unique user identifier'",
            'location'=>"char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Location object, user''s location'",
            'inline_message_id'=>" char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Identifier of the sent inline message'"
        ],$tableOptions);

        $this->createIndex('user_id','bot_chosen_inline_result','user_id');

        $this->addForeignKey(
            'chosen_inline_result_ibfk_1',
            'bot_chosen_inline_result',
            'user_id',
            'bot_user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('chosen_inline_result_ibfk_1', 'bot_chosen_inline_result');
        $this->dropIndex('user_id','bot_chosen_inline_result');
        $this->dropTable('bot_chosen_inline_result');
    }
}
