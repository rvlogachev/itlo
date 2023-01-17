<?php

use common\models\User;
use yii\db\Migration;

class m140703_123000_user extends Migration
{
    /**
     * @return bool|void
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(32),
            'auth_key' => $this->string(32)->notNull(),
            'access_token' => $this->string(40)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'oauth_client' => $this->string(),
            'oauth_client_user_id' => $this->string(),
            'uuid'=>$this->binary(16),
            'email' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(User::STATUS_ACTIVE),
	        'company_id' => $this->json(),
	        'type_id' => $this->bigInteger(),
	        'uid' => $this->string(250),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'logged_at' => $this->integer(),
            'bio' => $this->string(255),


        ]);

        $this->createTable('{{%user_profile}}', [
            'user_id' => $this->primaryKey(),
            'firstname' => $this->string(),
            'middlename' => $this->string(),
            'lastname' => $this->string(),
            'phone' => $this->string(),
            'avatar_path' => $this->string(),
            'avatar_base_url' => $this->string(),
            'locale' => $this->string(32)->notNull(),
            'gender' => $this->smallInteger(1),

	        'date_birth'=>$this->date(),
	        'position'=>$this->string(50),
	        'number'=>$this->bigInteger(),
	        'growth'=>$this->integer(),
	        'imt'=>$this->float(),
	        'work_pressure_min'=>$this->integer(),
	        'work_pressure_max'=>$this->integer(),
	        'down_pressure_min'=>$this->integer(),
	        'down_pressure_max'=>$this->integer(),
	        'pulse_min'=>$this->integer(),
	        'pulse_max'=>$this->integer(),
	        'is_disease'=>$this->integer(),
	        'weight'=>$this->integer(),

        ]);

        $this->addForeignKey('fk_user', '{{%user_profile}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');

    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user', '{{%user_profile}}');
        $this->dropTable('{{%user_profile}}');
        $this->dropTable('{{%user}}');

    }
}
