<?php
use yii\db\Migration;

class m220828_100558_create_table__shop_user extends Migration
{
    public function safeUp()
    {
        $tableExist = $this->db->getTableSchema("{{%shop_user}}", true);
        if ($tableExist) {
            return true;
        }

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%shop_user}}", [
            'id' => $this->primaryKey(),

            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

            'user_id' => $this->integer()->unique(),

        ], $tableOptions);

        $this->createIndex('shop_user__updated_by', '{{%shop_user}}', 'updated_by');
        $this->createIndex('shop_user__created_by', '{{%shop_user}}', 'created_by');
        $this->createIndex('shop_user__created_at', '{{%shop_user}}', 'created_at');
        $this->createIndex('shop_user__updated_at', '{{%shop_user}}', 'updated_at');

        $this->addForeignKey(
            'shop_user_created_by', "{{%shop_user}}",
            'created_by', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );

        $this->addForeignKey(
            'shop_user_updated_by', "{{%shop_user}}",
            'updated_by', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );

        $this->addForeignKey(
            'shop_user_user_id', "{{%shop_user}}",
            'user_id', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );

    }

    public function safeDown()
    {
        $this->dropForeignKey("shop_user_updated_by", "{{%shop_user}}");
        $this->dropForeignKey("shop_user_updated_by", "{{%shop_user}}");
        $this->dropForeignKey("shop_user_user_id", "{{%shop_user}}");

        $this->dropTable("{{%shop_user}}");
    }
}