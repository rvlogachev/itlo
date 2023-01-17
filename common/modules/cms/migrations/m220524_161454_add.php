<?php

use yii\db\Migration;

/**
 * Class m220524_161454_add
 */
class m220524_161454_add extends Migration
{
    public function safeUp()
    {
        $this->addColumn("{{%cms_site}}", "is_default", $this->integer(11)->null());

    }

    public function safeDown()
    {
        $this->dropColumn("{{%cms_site}}", "is_default");
    }
}
