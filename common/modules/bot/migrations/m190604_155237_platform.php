<?php

use yii\db\Migration;

/**
 * Class m190604_155237_platform
 */
class m190604_155237_platform extends Migration
{
    public function safeUp()
    {
        $this->addColumn('bot_user','platform',"VARCHAR(100)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('bot_user','platform',"VARCHAR(100)");
    }
}
