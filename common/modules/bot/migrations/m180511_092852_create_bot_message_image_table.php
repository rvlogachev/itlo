<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_message_image`.
 */
class m180511_092852_create_bot_message_image_table extends Migration
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
        $this->createTable('bot_message_image', [
            'id' => $this->primaryKey(),
            'message_id'=>$this->integer(),
            'path'=>$this->string(255),
            'base_url'=>$this->string(255),
            'type'=>$this->string(255),
            'size'=>$this->integer(11),
            'name'=>$this->string(255),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'order'=>$this->integer()
        ],$tableOptions);

        $this->createIndex(
            'idx-bot_message_image',
            'bot_message_image',
            'message_id'
        );

        $this->addForeignKey(
            'FK_bot_image_message',
            'bot_message_image',
            'message_id',
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
        $this->dropForeignKey('FK_bot_image_message','bot_message_image');
        $this->dropIndex('idx-bot_message_image','bot_message_image');
        $this->dropTable('bot_message_image');
    }
}
