<?php

use yii\db\Migration;

/**
 * Class m190114_191244_users
 */
class m190114_191244_users extends Migration
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

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->datetime()->defaultExpression('CURRENT_TIMESTAMP'),
            '_to_del_name' => $this->string()->defaultValue(null),
            'image_id' => $this->smallInteger()->defaultValue(null),
            'gender' =>  'enum(\'men\',\'women\') NOT NULL DEFAULT \'men\'',
            'active' => $this->char(1)->notNull()->defaultValue('Y'),
            'updated_by' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_by' => $this->smallInteger()->notNull()->defaultValue(0),
            'logged_at' => $this->smallInteger()->defaultValue(null),
            'last_activity_at' => $this->smallInteger()->defaultValue(null),
            'last_admin_activity_at' => $this->smallInteger()->defaultValue(null),
            'email' => $this->string(255)->notNull()->unique(),
            'phone' => $this->string(64)->notNull()->unique(),
            'email_is_approved' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'phone_is_approved' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'first_name' => $this->string(255)->defaultValue(null),
            'last_name' => $this->string(255)->defaultValue(null),
            'patronymic' => $this->string(255)->defaultValue(null),

            'email_confirm_token' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'lastseen_at' => $this->datetime()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
