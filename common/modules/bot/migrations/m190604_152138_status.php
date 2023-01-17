<?php

use yii\db\Migration;

/**
 * Class m190604_152138_status
 */
class m190604_152138_status extends Migration
{
    public function safeUp()
    {
        $this->addColumn('bot_user','status',"VARCHAR(10)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('bot_user','status',"VARCHAR(10)");
    }
}
