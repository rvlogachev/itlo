<?php

use yii\db\Migration;

/**
 * Class m190604_152740_role
 */
class m190604_152740_role extends Migration
{
    public function safeUp()
    {
        $this->addColumn('bot_user','role',"VARCHAR(100)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('bot_user','role',"VARCHAR(100)");
    }
}
