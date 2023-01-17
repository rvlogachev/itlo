<?php

use common\models\User;
use yii\db\Migration;

class m150725_192740_seed_data extends Migration
{
    /**
     * @return bool|void
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'webmaster',
            'email' => 'webmaster@example.com',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('webmaster'),
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'access_token' => Yii::$app->getSecurity()->generateRandomString(40),
            'status' => User::STATUS_ACTIVE,

            'created_at' => time(),
            'updated_at' => time()
        ]);

	    $this->insert('{{%user}}', [
		    'id' => 2,
		    'username' => 'doctor',
		    'email' => 'doctor@example.com',
		    'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('doctor'),
		    'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
		    'access_token' => Yii::$app->getSecurity()->generateRandomString(40),
		    'status' => User::STATUS_ACTIVE,
		    'created_at' => time(),
		    'updated_at' => time()
	    ]);

        $this->insert('{{%user_profile}}', [
            'user_id' => 1,
            'locale' => 'ru-RU',
            'firstname' => 'SuperAdmin',
            'lastname' => '',
            'avatar_path' => '/source/anonymous.png',
            'avatar_base_url' => Yii::getAlias('@storageUrl'),

        ]);


	    $this->insert('{{%user_profile}}', [
		    'user_id' => 2,
		    'locale' => 'ru-RU',
		    'firstname' => 'Doctor',
		    'lastname' => '',
		    'avatar_path' => '/source/anonymous.png',
		    'avatar_base_url' => Yii::getAlias('@storageUrl')
	    ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.theme-skin',
            'value' => 'skin-blue',
            'comment' => 'skin-blue, skin-black, skin-purple, skin-green, skin-red, skin-yellow'
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-fixed',
            'value' => 0
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-boxed',
            'value' => 0
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-collapsed-sidebar',
            'value' => 0
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'frontend.maintenance',
            'value' => 'disabled',
            'comment' => 'Set it to "enabled" to turn on maintenance mode'
        ]);

    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {
        $this->delete('{{%key_storage_item}}', [
            'key' => 'frontend.maintenance'
        ]);

        $this->delete('{{%key_storage_item}}', [
            'key' => [
                'backend.theme-skin',
                'backend.layout-fixed',
                'backend.layout-boxed',
                'backend.layout-collapsed-sidebar',
            ],
        ]);


        $this->delete('{{%user_profile}}', [
            'user_id' => [1]
        ]);

        $this->delete('{{%user}}', [
            'id' => [1]
        ]);
    }
}
