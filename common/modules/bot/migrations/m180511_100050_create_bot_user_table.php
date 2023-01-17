<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_user`.
 */
class m180511_100050_create_bot_user_table extends Migration
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
        $this->createTable('bot_user', [
            'id'=> "bigint(20) NOT NULL PRIMARY KEY COMMENT 'Unique user identifier'",
            'first_name'=>"char(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'User''s first name'",
            'last_name'=> "char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'User''s last name'",
            'username'=> "char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'User''s username'",
            'created_at'=> "timestamp NULL DEFAULT NULL COMMENT 'Entry date creation'",
            'updated_at'=> "timestamp NULL DEFAULT NULL COMMENT 'Entry date update'",
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('bot_user');
    }
}
