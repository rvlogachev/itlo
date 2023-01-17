<?php

use yii\db\Migration;

/**
 * Class m190604_155459_cookie
 */
class m190604_155459_cookie extends Migration
{
    public function safeUp()
    {
        $this->addColumn('bot_user','cookie',"VARCHAR(100)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('bot_user','cookie',"VARCHAR(100)");
    }
}
