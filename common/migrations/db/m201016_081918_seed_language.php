<?php

use yii\db\Migration;

/**
 * Class m201016_081918_seed_language
 */
class m201016_081918_seed_language extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{

		$this->insert('{{%i18n_source_message}}', [
			'category' => 'backend',
			'message' => 'Update',
		]);
		$this->insert('{{%i18n_message}}', [
			'id'=>1,
			'language' => 'ru',
			'translation' => 'Обновить',
		]);


		$this->insert('{{%i18n_source_message}}', [
			'category' => 'backend',
			'message' => 'Create Med Company',
		]);
		$this->insert('{{%i18n_message}}', [
			'id'=>2,
			'language' => 'ru',
			'translation' => 'Добавление компании',
		]);


		$this->insert('{{%i18n_source_message}}', [
			'category' => 'backend',
			'message' => 'Create',
		]);
		$this->insert('{{%i18n_message}}', [
			'id'=>3,
			'language' => 'ru',
			'translation' => 'Добавить ',
		]);

		$this->insert('{{%i18n_source_message}}', [
			'category' => 'backend',
			'message' => 'Create Med Doctors',
		]);
		$this->insert('{{%i18n_message}}', [
			'id'=>4,
			'language' => 'ru',
			'translation' => 'Добавление врача',
		]);

		$this->insert('{{%i18n_source_message}}', [
			'category' => 'backend',
			'message' => 'Status',
		]);
		$this->insert('{{%i18n_message}}', [
			'id'=>5,
			'language' => 'ru',
			'translation' => 'Статус',
		]);

		$this->insert('{{%i18n_source_message}}', [
			'category' => 'backend',
			'message' => 'Create Questions',
		]);
		$this->insert('{{%i18n_message}}', [
			'id'=>6,
			'language' => 'ru',
			'translation' => 'Добавление вопросов',
		]);

		$this->insert('{{%i18n_source_message}}', [
			'category' => 'backend',
			'message' => 'Profile',
		]);
		$this->insert('{{%i18n_message}}', [
			'id'=>7,
			'language' => 'ru',
			'translation' => 'Профиль',
		]);

		$this->insert('{{%i18n_source_message}}', [
			'category' => 'backend',
			'message' => 'Save',
		]);
		$this->insert('{{%i18n_message}}', [
			'id'=>8,
			'language' => 'ru',
			'translation' => 'Сохранить',
		]);

		$this->insert('{{%i18n_source_message}}', [
			'category' => 'backend',
			'message' => 'Account',
		]);
		$this->insert('{{%i18n_message}}', [
			'id'=>9,
			'language' => 'ru',
			'translation' => 'Аккаунт',
		]);

		$this->insert('{{%i18n_source_message}}', [
			'category' => 'backend',
			'message' => 'Logout',
		]);
		$this->insert('{{%i18n_message}}', [
			'id'=>10,
			'language' => 'ru',
			'translation' => 'Выход',
		]);

		$this->insert('{{%i18n_source_message}}', [
			'category' => 'backend',
			'message' => 'Application timeline',
		]);
		$this->insert('{{%i18n_message}}', [
			'id'=>11,
			'language' => 'ru',
			'translation' => 'События системы',
		]);

		$this->insert('{{%i18n_source_message}}', [
			'category' => 'backend',
			'message' => 'Delete',
		]);
		$this->insert('{{%i18n_message}}', [
			'id'=>12,
			'language' => 'ru',
			'translation' => 'Удалить',
		]);


	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->delete('{{%i18n_message}}', [
			'user_id' => [1]
		]);
	}
}
