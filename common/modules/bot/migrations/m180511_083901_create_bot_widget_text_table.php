<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_widget_text`.
 */
class m180511_083901_create_bot_widget_text_table extends Migration
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
        $this->createTable('bot_widget_text', [
            'id' => $this->primaryKey(),
            'key'=>$this->string(255),
            'title'=>$this->string(255),
            'body'=>$this->string(255),
            'status'=>$this->integer(6),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'images'=>$this->string(1024),
            'screens_id'=>$this->integer(),
            'sort'=>$this->integer(),
            'buttons'=>$this->text(),

            'media'=>$this->string(1024),

        ],$tableOptions);

        $this->createIndex(
            'idx-bot_widget_text_screens_id',
            'bot_widget_text',
            'screens_id'
        );
        $this->createIndex(
            'idx-bot_widget_text',
            'bot_widget_text',
            'key'
        );

        $this->addForeignKey(
            'FK_bot_widget_text',
            'bot_widget_text',
            'screens_id',
            'bot_screens',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_bot_widget_text','bot_widget_text');
        $this->dropIndex('idx-bot_widget_text','bot_widget_text');

        $this->dropTable('bot_widget_text');
    }
}
