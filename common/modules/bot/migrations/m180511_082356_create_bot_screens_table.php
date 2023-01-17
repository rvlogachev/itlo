<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_screens`.
 */
class m180511_082356_create_bot_screens_table extends Migration
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

        $this->createTable('bot_screens', [
            'id' => $this->primaryKey(),
            'key'=>$this->string(255),
            'title'=>$this->string(255),
            'body'=>$this->text(),
            'status'=>$this->integer(6),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'buttons'=>$this->text(),
            'is_start'=>$this->integer(),
            'time_send'=>$this->integer(),
            'function'=>$this->string(50),
            'parent_id'=>$this->integer(),
            'sort'=>$this->integer(),
            'auth'=>$this->string(1000),
            'timeout'=>$this->integer(),
            'thumbnail'=>$this->string(500),
            'thumbnail_path'=>$this->string(500),
            'thumbnail_base_url'=>$this->string(500)


        ],$tableOptions);

        $this->createIndex(
            'idx_ben_screens_key',
            'bot_screens',
            'key'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx_ben_screens_key',
            'bot_screens');
        $this->dropTable('bot_screens');
    }
}
