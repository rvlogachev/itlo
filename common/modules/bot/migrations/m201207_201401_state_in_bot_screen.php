<?php

use yii\db\Migration;

/**
 * Class m201207_201401_state_in_bot_screen
 */
class m201207_201401_state_in_bot_screen extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('bot_screens','state','VARCHAR(512) DEFAULT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('bot_screens','state');
    }
}
