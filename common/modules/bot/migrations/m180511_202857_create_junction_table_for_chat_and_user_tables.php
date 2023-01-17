<?php

use yii\db\Migration;

/**
 * Handles the creation of table `chat_user`.
 * Has foreign keys to the tables:
 *
 * - `chat`
 * - `user`
 */
class m180511_202857_create_junction_table_for_chat_and_user_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('bot_chat_user', [
            'chat_id' => "bigint(20) NOT NULL COMMENT 'Unique user identifier'",
            'user_id' => "bigint(20) NOT NULL COMMENT 'Unique user identifier'",
            'PRIMARY KEY(chat_id, user_id)',
        ]);

        // creates index for column `chat_id`
        $this->createIndex(
            'idx-chat_user-chat_id',
            'bot_chat_user',
            'chat_id'
        );

        // add foreign key for table `chat`
        $this->addForeignKey(
            'fk-chat_user-chat_id',
            'bot_chat_user',
            'chat_id',
            'bot_chat',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-chat_user-user_id',
            'bot_chat_user',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-chat_user-user_id',
            'bot_chat_user',
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
        // drops foreign key for table `chat`
        $this->dropForeignKey(
            'fk-chat_user-chat_id',
            'bot_chat_user'
        );

        // drops index for column `chat_id`
        $this->dropIndex(
            'idx-chat_user-chat_id',
            'bot_chat_user'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-chat_user-user_id',
            'bot_chat_user'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-chat_user-user_id',
            'bot_chat_user'
        );

        $this->dropTable('bot_chat_user');
    }
}
