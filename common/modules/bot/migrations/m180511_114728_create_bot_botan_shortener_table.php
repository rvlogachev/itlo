<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_botan_shortener`.
 */
class m180511_114728_create_bot_botan_shortener_table extends Migration
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
        $this->createTable('bot_botan_shortener', [
            'id' => 'bigint(20) unsigned NOT NULL  PRIMARY KEY AUTO_INCREMENT COMMENT "Unique identifier for this entry"',
            'user_id'=>'bigint(20) DEFAULT NULL COMMENT "Unique user identifier"',
            'url'=>'text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT "Original URL"',
            'short_url'=>'char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT "" COMMENT "Shortened URL"',
            'created_at'=>'timestamp NULL DEFAULT NULL COMMENT "Entry date creation"'
        ],$tableOptions);
        $this->createIndex('user_id','bot_botan_shortener','user_id');
        $this->addForeignKey('botan_shortener_ibfk_1','bot_botan_shortener','user_id','bot_user','id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('botan_shortener_ibfk_1','bot_botan_shortener');
        $this->dropIndex('user_id','bot_botan_shortener');
        $this->dropTable('bot_botan_shortener');
    }
}
