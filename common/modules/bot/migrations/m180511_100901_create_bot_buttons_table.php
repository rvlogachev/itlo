<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_buttons`.
 */
class m180511_100901_create_bot_buttons_table extends Migration
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
        $this->createTable('bot_buttons', [
            'id' => $this->primaryKey(),
            'updated_at'=>$this->integer(),
            'created_at'=>$this->integer(),
            'key'=>$this->string(50),
            'type'=>$this->string(50),
            'size'=>$this->string(50),
            'callback_data'=>$this->string(150),
            'text'=>$this->string(50),
            'url'=>$this->string(500),
            'status'=>$this->integer(),
            'widget_text_id'=>$this->integer(),
            'request_contact'=>$this->integer(),
            'request_location'=>$this->integer()
        ],$tableOptions);

        $this->createIndex(
            'idx-bot_buttons_widget_text',
            'bot_buttons',
            'widget_text_id'
        );

        $this->addForeignKey(
            'FK_bot_buttons_widget_text',
            'bot_buttons',
            'widget_text_id',
            'bot_widget_text',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'FK_bot_buttons_widget_text',
            'bot_buttons'
        );

        $this->dropIndex(
            'idx-bot_buttons_widget_text',
            'bot_buttons'
        );

        $this->dropTable('bot_buttons');
    }
}
