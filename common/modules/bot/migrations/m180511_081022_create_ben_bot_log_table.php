<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ben_bot_log`.
 */
class m180511_081022_create_ben_bot_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('bot_log', [
            'id' => $this->primaryKey(),
            'update_id' =>$this->integer(50),
            'is_callback'=>$this->integer(50),
            'callback_query_id'=>$this->string(100),
            'callback_query_from_id'=>$this->integer(50),
            'callback_query_from_is_bot'=>$this->string(255),
            'callback_query_from_first_name'=>$this->string(255),
            'callback_query_from_username'=>$this->string(255),
            'callback_query_from_language_code'=>$this->string(255),
            'callback_chat_instance'=>$this->integer(50),
            'callback_data'=>$this->string(255),
            'message_id'=>$this->integer(50),
            'from_id'=>$this->integer(50),
            'from_is_bot'=>$this->integer(),
            'from_first_name'=>$this->string(255),
            'from_username'=>$this->string(255),
            'from_language_code'=>$this->string(255),
            'chat_id'=>$this->integer(50),
            'chat_first_name'=>$this->string(255),
            'chat_username'=>$this->string(255),
            'chat_type'=>$this->string(255),
            'date'=>$this->string(255),
            'text'=>$this->text(),
            'entities'=>$this->text()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('bot_log');
    }
}
