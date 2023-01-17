<?php

use yii\db\Migration;

/**
 * Class m201210_173927_add_lang_to_22
 */
class m201210_173927_add_lang_to_22 extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $resDel = \Yii::$app->db->createCommand(" 
        delete from bot_screens;
        ");
        $resDel->query();

        $res = \Yii::$app->db->createCommand("
                       
                
                SELECT 'vk' INTO @platform;
                SELECT 'start_vk' INTO @screen_key;
                SELECT 1 INTO @is_start;
                SELECT 0 INTO @parent_id;
                SELECT 'Стартовый экран (Vkontakte)' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Здравствуйте! ' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                
                
                 SELECT 'Начало' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                SELECT UNIX_TIMESTAMP()+1 INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Вас приветствует сервис ООО \"Уралэнергосбыт\". Здесь вы можете узнать баланс  лицевого счёта, данные прибора учёта и передать показания. Продолжить работу?' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 2, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Да' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'middle', 'enter', @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                SELECT 'Нет' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'middle', 'end_vk', @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                SELECT @id_screen INTO @start_vk;
                
                
                SELECT 'registration_1_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @start_vk INTO @parent_id;
                SELECT 'Регистрация - Соглашение' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP()+1 INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Для регистрации аккаунта необходимо принять Пользовательское соглашение и Условия оказания услуг. ' 
                INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                SELECT UNIX_TIMESTAMP()+2 INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Нажимая кнопку \"Соглашаюсь\", Вы принимаете <a href=\"/\">Пользовательское соглашение</a> и <a href=\"/\">Условия оказания услуг</a>.' 
                INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 2, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Соглашаюсь' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
               
                
               
                
                SELECT 'registration_1_1_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @id_screen INTO @parent_id;
                SELECT 'Регистрация - Ввод согласие' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 100, NULL, NULL, NULL, NULL, NULL, NULL);
                
                 SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Укажите Ваш номер телефона' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                 SELECT LAST_INSERT_ID() INTO @id_message;
              
                SELECT 'Поделиться контактом' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 1, 0, NULL);
                
                
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                
                
                
                SELECT 'registration_2_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @id_screen INTO @parent_id;
                SELECT 'Регистрация - Ввод кода' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 100, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Введите код отправленный по SMS:' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                SELECT @id_screen INTO @registration_screen;
                
                SELECT 'registration_3_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @registration_screen INTO @parent_id;
                SELECT 'Регистрация - Упешная проверка кода ' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 100, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Спасибо. Вы прошли проверку.  ' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                
                
                SELECT 'registration_4_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @registration_screen INTO @parent_id;
                SELECT 'Регистрация - Неупешная проверка кода ' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 100, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Введенный код неверен.' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Вы хотите ввести код еще раз?' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Да' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'middle', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                SELECT 'Нет' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'middle', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                
                
                SELECT 'add_account_1_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @start_vk INTO @parent_id;
                SELECT 'Привязка ЛС - Шаг 1' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 5, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Вы зарегистрированы.' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times+1) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Но, для работы в аккаунте Вам необходимо привязать ЛС.' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 2, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Привязать новый ЛС' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                
                SELECT 'add_account_2_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @id_screen INTO @parent_id;
                SELECT 'Привязка ЛС - Ввод ЛС' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 5, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Введите номер лицевого счета: 
                9999999999 (10 цифр, без кода района)' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                 SELECT @id_screen INTO @check_code;
                
                SELECT 'add_account_3_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @check_code INTO @parent_id;
                SELECT 'Привязка ЛС - Соотвествует формату' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 5, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Отлично. Введенный ЛС соотвествует формату. ЛС добавлен' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                 
                
                
                SELECT 'add_account_4_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @check_code INTO @parent_id;
                SELECT 'Привязка ЛС - Не соотвествует формату' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 5, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Введенный ЛС не соотвествует формату.  ' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times+1) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Вы хотите повторить ввод ЛС? (Введите 10 цифр)' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Да' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'middle', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                 
                
                SELECT 'Нет' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'middle', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                
                
                
                
                
                
                
                
                SELECT 'work_account_1_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @start_vk INTO @parent_id;
                SELECT 'Работа в аккаунте - Меню' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 5, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Хорошо' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times+1) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Выберите действие:' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 2, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                
                SELECT 'Выбрать ЛС' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                SELECT 'Привязать новый ЛС' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                
                
                SELECT 'work_account_2_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @id_screen INTO @parent_id;
                SELECT 'Работа в аккаунте - Выбор ЛС' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 5, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Выберите ЛС:' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                SELECT 'work_account_3_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @start_vk INTO @parent_id;
                SELECT 'Работа в аккаунте - Основное меню' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 7, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT @id_screen into @main_menu;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Вы находитесь в главном меню.' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                 SELECT UNIX_TIMESTAMP()+1 INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title;
                
                SELECT 'Выберите что Вас интересует:' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Просмотр баланса' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                SELECT 'Последний счёт' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                SELECT 'Передать показания' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                SELECT 'Просмотр МПИ' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                SELECT 'Другие аккаунты' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                SELECT 'Отвязать ЛС' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                 
                
                SELECT 'work_account_4_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @main_menu INTO @parent_id;
                SELECT 'Основное меню - Баланс ЛС' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 5, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Баланс лицевого счета...' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                
                SELECT 'work_account_5_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @main_menu INTO @parent_id;
                SELECT 'Основное меню - Последний счет' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 5, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Последнее начисление...' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                 
                SELECT 'work_account_6_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @main_menu INTO @parent_id;
                SELECT 'Основное меню - Передать показания' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 5, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Проверка наличия ПУ...' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                SELECT 'work_account_7_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @main_menu INTO @parent_id;
                SELECT 'Основное меню - Просмотр МПИ' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 5, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Данные прибора учета по лицевому счету...' INTO @message_body;
                 
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                SELECT 'work_account_8_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @main_menu INTO @parent_id;
                SELECT 'Основное меню - Другие аккаунты' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 5, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Лицевой счет привязан всего к ... аккаунтам' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                
                SELECT 'work_account_9_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @main_menu INTO @parent_id;
                SELECT 'Основное меню - Отвязать ЛС' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 5, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP()+1 INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Внимание! Вы находитесь в меню отвязки ЛС от аккаунта.' INTO @message_body;
                 
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Отменить' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                 SELECT UNIX_TIMESTAMP()+2 INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Вы уверены что хотите отвязать ЛС {{number_lc}}?' INTO @message_body;
                 
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'Да' INTO @button_txt;
                SELECT 'yes' INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'middle', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                 
                
                SELECT 'Нет' INTO @button_txt;
                SELECT 'no' INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'middle', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                
                 
                 
                SELECT 'end_vk' INTO @screen_key;
                SELECT 0 INTO @is_start;
                SELECT @start_vk INTO @parent_id;
                SELECT 'Завершение(Телеграм)' INTO @screen_title;
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_screens` (`key`, `title`, `body`, `status`, `created_at`, `platform`, `updated_at`, `buttons`, `is_start`, `time_send`, `function`, `parent_id`, `sort`, `auth`, `timeout`, `thumbnail`, `thumbnail_path`, `thumbnail_base_url`, `state`) 
                VALUES (@screen_key, @screen_title, NULL, 1, @times, @platform, @times, NULL, @is_start, NULL, NULL, @parent_id, 100, NULL, NULL, NULL, NULL, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_screen;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                SELECT CONCAT(CONCAT(@screen_key,'_'),@times) INTO @message_key; 
                SELECT CONCAT(CONCAT(@screen_title,'_'),@times) INTO @message_title; 
                
                SELECT 'Спасибо за использование нашего сервиса. Если у вас остались вопросы, вы можете обратиться по бесплатному телефону 8-800-2222-500. Ждем Вас снова.' INTO @message_body;
                
                INSERT INTO `bot_widget_text` (`key`, `title`, `body`, `status`, `created_at`, `updated_at`, `images`, `screens_id`, `sort`, `buttons`, `media`) 
                VALUES (@message_key, @message_title, @message_body, 1, @times, @times, NULL, @id_screen, 1, NULL, NULL);
                
                SELECT LAST_INSERT_ID() INTO @id_message;
                
                SELECT 'В начало' INTO @button_txt;
                SELECT transliterate_func(@button_txt) INTO @button_key;
                
                SELECT UNIX_TIMESTAMP() INTO @times;
                
                INSERT INTO `bot_buttons` (`updated_at`, `created_at`, `key`, `type`, `size`, `callback_data`, `text`, `url`, `status`, `widget_text_id`, `request_contact`, `request_location`, `color`) 
                VALUES (@times, @times, NULL, 'ReplyKeyboardMarkup', 'big', @button_key, @button_txt, '', 1, @id_message, 0, 0, NULL);
                
                
                
                
                
                
             

        ");
        $res->query();




    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $res = \Yii::$app->db->createCommand(" 
        delete from bot_screens where platform = 'vk';
        ");
        $res->query();

    }
}
