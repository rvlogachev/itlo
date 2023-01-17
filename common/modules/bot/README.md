Модуль bot
=======
Модуль чат ботов
***
# Установка

Перейдите в папку 
`common/modules`

Клонируйте репозиторий
`
git clone http://gitlab.infomarketstudio.ru/modules/chat.git
`
При необходимости вносить кастомные доработки создайте модуль в папке backend и
унаследуйте функциональность от базового модуля.

Доступны:

`/frontend/web/chat/defualt/index`

`/frontend/web/chat/defualt/chat`
# Настройка

Модуль чат-бота пока включает 2 фронтенд страницы, админка будет дорабатываться.
Сейчас для подключения необходимо в  `frontend/config/web.php` в блоке modules указать параметры подключения модуля.
```php
'chat' => [
            'class' => 'common\modules\chat\ChatModule',
        ],
```        


Доступные функции Javascript

sendMessageBot('Текст сообщения')

sendMessageUser('Текст сообщения')

Restart()

PressBtn()

Printing()