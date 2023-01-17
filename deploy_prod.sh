#!/bin/bash
BASEDIR=`dirname $0`
PROJECT_PATH=`cd $BASEDIR; pwd`
unset MODULES
MODULES[blog]=$PROJECT_PATH/common/modules/blog
MODULES[shop]=$PROJECT_PATH/common/modules/shop
MODULES[bot]=$PROJECT_PATH/common/modules/bot
MODULES[chat]=$PROJECT_PATH/common/modules/chat
MODULES[content]=$PROJECT_PATH/common/modules/content
MODULES[crm]=$PROJECT_PATH/common/modules/crm
MODULES[file]=$PROJECT_PATH/common/modules/file
MODULES[integration]=$PROJECT_PATH/common/modules/integration
MODULES[modulemanager]=$PROJECT_PATH/common/modules/modulemanager
MODULES[permit]=$PROJECT_PATH/common/modules/permit
MODULES[queuemanager]=$PROJECT_PATH/common/modules/queuemanager
MODULES[rbac]=$PROJECT_PATH/common/modules/rbac
MODULES[stat]=$PROJECT_PATH/common/modules/stat
MODULES[system]=$PROJECT_PATH/common/modules/system
MODULES[translation]=$PROJECT_PATH/common/modules/translation
MODULES[widget]=$PROJECT_PATH/common/modules/widget
MODULES[zadarma]=$PROJECT_PATH/common/modules/zadarma
MODULES[tunel]=$PROJECT_PATH/common/modules/tunel




if  [ ! -d  $PROJECT_PATH/common/modules/$2 ] && [$1='install'] ; then
	echo "Модуль $2 не установлен, для установки выполните: bash deploy.sh install <name_module> "
	exit 0
fi


case "$1" in
  main)
	echo "Выполняю обновление основгого проекта"
	git pull
	git add .
	git commit -m "fix"
	git push
	echo "Запускаю обновление на удаленном сервере"

	phing -f build_prod.xml

	echo "Обновление основного проекта закончено."
	;;
  up)
 	echo "Вызвана команда UP"
	echo  "Перехожу в модуль " $2
	cd common/modules/$2
	pwd
	echo "Обновляю модуль"
	git pull
	echo "Проверим наличие миграций в модуле"
		if  [ -d $PROJECT_PATH/common/modules/$2/migrations ]; then
			echo 'Миграции найдены.'
                	echo "Обновляю миграции..."
                	php $PROJECT_PATH/console/yii migrate-$2 --interactive=0
		else
			echo "Миграции не найдены"
		fi
	echo "Обновлен модуль "$2
        ;;
  push)
 	echo "Вызвана команда PUSH"
	echo  "Перехожу в модуль " $2
	cd common/modules/$2
	pwd
	echo "Обновляю модуль"
	bash deploy.sh
	echo "Изменения отправлены в  модуль " $2
        ;;
  install)
 	echo "Вызвана команда INSTALL"
	echo  "Перехожу в модули "
	cd common/modules/
	pwd
	echo "Клонируем  модуль" $2
	git clone http://ilogachev:Derw45sh84@gitlab.infomarketstudio.ru/modules/$2.git
	echo "Модуль $2 установлен в файловой системе,"
	php $PROJECT_PATH/console/yii migrate-$2 --interactive=0

	echo "файл readme доступен http://gitlab.infomarketstudio.ru/modules/$2/blob/master/README.md"
        ;;
  uninstall)
 	echo "Вызвана команда UNINSTALL"
	echo  "Перехожу в модули "
	cd common/modules/
	pwd
	echo "Удаляем  модуль" $2
	rm -rf $2
	echo "Модуль $2 удален в файловой системе"
        ;;
  list)
 	echo "Вызвана команда LIST"
	echo  "Перехожу в модули "
	cd common/modules/
	pwd
	echo "Список установвленных модулей"
	ls -all
        ;;

   init)
 	echo "Вызвана команда INIT"
	echo  "Перехожу в модули "
	cd common/modules/
	pwd

	echo "Клонируем  модуль" base
	git clone http://ilogachev:Derw45sh84@gitlab.infomarketstudio.ru/modules/base.git
	echo "Модуль base установлен в файловой системе,"
	php $PROJECT_PATH/console/yii migrate-base --interactive=0

	echo "Клонируем  модуль" blog
	git clone http://ilogachev:Derw45sh84@gitlab.infomarketstudio.ru/modules/blog.git
	echo "Модуль $2 установлен в файловой системе,"
	php $PROJECT_PATH/console/yii migrate-blog --interactive=0

	echo "Клонируем  модуль" file
	git clone http://ilogachev:Derw45sh84@gitlab.infomarketstudio.ru/modules/file.git
	echo "Модуль $2 установлен в файловой системе,"
	php $PROJECT_PATH/console/yii migrate-file --interactive=0

	echo "Клонируем  модуль" rbac
	git clone http://ilogachev:Derw45sh84@gitlab.infomarketstudio.ru/modules/rbac.git
	echo "Модуль $2 установлен в файловой системе,"
	php $PROJECT_PATH/console/yii migrate-rbac --interactive=0

	echo "Клонируем  модуль" system
	git clone http://ilogachev:Derw45sh84@gitlab.infomarketstudio.ru/modules/system.git
	echo "Модуль $2 установлен в файловой системе,"
	php $PROJECT_PATH/console/yii migrate-system --interactive=0

	echo "Клонируем  модуль" translation
	git clone http://ilogachev:Derw45sh84@gitlab.infomarketstudio.ru/modules/translation.git
	echo "Модуль $2 установлен в файловой системе,"


	echo "Клонируем  модуль" widget
	git clone http://ilogachev:Derw45sh84@gitlab.infomarketstudio.ru/modules/widget.git
	echo "Модуль $2 установлен в файловой системе,"
	php $PROJECT_PATH/console/yii migrate-widget --interactive=0

	echo "Клонируем  модуль" content
	git clone http://ilogachev:Derw45sh84@gitlab.infomarketstudio.ru/modules/content.git
	echo "Модуль $2 установлен в файловой системе,"
	php $PROJECT_PATH/console/yii migrate-content --interactive=0

	echo "Клонируем  модуль" prpart
	git clone http://ilogachev:Derw45sh84@gitlab.infomarketstudio.ru/modules/prpart.git
	echo "Модуль $2 установлен в файловой системе,"
	php $PROJECT_PATH/console/yii migrate-prpart --interactive=0

	echo "Клонируем  модуль" chat
	git clone http://ilogachev:Derw45sh84@gitlab.infomarketstudio.ru/modules/chat.git
	echo "Модуль $2 установлен в файловой системе,"
	php $PROJECT_PATH/console/yii migrate-chat --interactive=0

        ;;
esac
exit 0
