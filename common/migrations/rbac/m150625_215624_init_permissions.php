<?php

use common\models\User;
use common\rbac\Migration;

class m150625_215624_init_permissions extends Migration
{
    public function up()
    {
	    /**
	     * Роли
	     */
        $managerRole = $this->auth->getRole(User::ROLE_MANAGER_HR);
        $doctorRole = $this->auth->getRole(User::ROLE_DOCTOR);
        $administratorRole = $this->auth->getRole(User::ROLE_ADMIN);
	    /**
	     * Разрешения
	     */

	    /**
	     * Доступ к бекенду
	     */
        $loginToBackend = $this->auth->createPermission('loginToBackend');
        $this->auth->add($loginToBackend);
        $this->auth->addChild($administratorRole, $loginToBackend);
	    $this->auth->addChild($managerRole, $loginToBackend);
	    $this->auth->addChild($doctorRole, $loginToBackend);

	    /**
	     * Просмотр событий в системе
	     */
	    $timeline = $this->auth->createPermission('timeline-event/index');
	    $this->auth->add($timeline);
	    $this->auth->addChild($administratorRole, $timeline);
	    $this->auth->addChild($managerRole, $timeline);
	    $this->auth->addChild($doctorRole, $timeline);

	    /**
	     * Пользователи
	     */
	    $user_view = $this->auth->createPermission('user/view');
	    $this->auth->add($user_view);
	    $this->auth->addChild($administratorRole, $user_view);
	    $this->auth->addChild($managerRole, $user_view);

	    $user_index = $this->auth->createPermission('user/index');
	    $this->auth->add($user_index);
	    $this->auth->addChild($administratorRole, $user_index);
	    $this->auth->addChild($managerRole, $user_index);

	    $user_create = $this->auth->createPermission('user/create');
	    $this->auth->add($user_create);
	    $this->auth->addChild($administratorRole, $user_create);
	    $this->auth->addChild($managerRole, $user_create);

	    $user_delete = $this->auth->createPermission('user/delete');
	    $this->auth->add($user_delete);
	    $this->auth->addChild($administratorRole, $user_delete);
	    $this->auth->addChild($managerRole, $user_delete);

	    $user_update = $this->auth->createPermission('user/update');
	    $this->auth->add($user_update);
	    $this->auth->addChild($administratorRole, $user_update);
	    $this->auth->addChild($managerRole, $user_update);

	    $user_profile = $this->auth->createPermission('user/profile');
	    $this->auth->add($user_profile);
	    $this->auth->addChild($administratorRole, $user_profile);
	    $this->auth->addChild($managerRole, $user_profile);

	    $user_avatar_upload = $this->auth->createPermission('user/avatar-upload');
	    $this->auth->add($user_avatar_upload);
	    $this->auth->addChild($administratorRole, $user_avatar_upload);
	    $this->auth->addChild($managerRole, $user_avatar_upload);

	    $user_avatar_delete= $this->auth->createPermission('user/avatar-delete');
	    $this->auth->add($user_avatar_delete);
	    $this->auth->addChild($administratorRole, $user_avatar_delete);
	    $this->auth->addChild($managerRole, $user_avatar_delete);


	    /**
	     * Врачи
	     */
	    $doctors_view = $this->auth->createPermission('doctors/view');
	    $this->auth->add($doctors_view);
	    $this->auth->addChild($administratorRole, $doctors_view);


	    $doctors_index = $this->auth->createPermission('doctors/index');
	    $this->auth->add($doctors_index);
	    $this->auth->addChild($administratorRole, $doctors_index);


	    $doctors_create = $this->auth->createPermission('doctors/create');
	    $this->auth->add($doctors_create);
	    $this->auth->addChild($administratorRole, $doctors_create);


	    $doctors_delete = $this->auth->createPermission('doctors/delete');
	    $this->auth->add($doctors_delete);
	    $this->auth->addChild($administratorRole, $doctors_delete);


	    $doctors_update = $this->auth->createPermission('doctors/update');
	    $this->auth->add($doctors_update);
	    $this->auth->addChild($administratorRole, $doctors_update);

	    $doctors_avatar_upload = $this->auth->createPermission('doctors/avatar-upload');
	    $this->auth->add($doctors_avatar_upload);
	    $this->auth->addChild($administratorRole, $doctors_avatar_upload);



	    /**
	     * Отчеты
	     */
	    $report_view = $this->auth->createPermission('report/view');
	    $this->auth->add($report_view);
	    $this->auth->addChild($administratorRole, $report_view);
	    $this->auth->addChild($doctorRole, $report_view);
	    $this->auth->addChild($managerRole, $report_view);


	    $report_index = $this->auth->createPermission('report/index');
	    $this->auth->add($report_index);
	    $this->auth->addChild($administratorRole, $report_index);
	    $this->auth->addChild($doctorRole, $report_index);
	    $this->auth->addChild($managerRole, $report_index);

	    $report_delete = $this->auth->createPermission('report/delete');
	    $this->auth->add($report_delete);
	    $this->auth->addChild($administratorRole, $report_delete);


	    /**
	     * Справочник компаний
	     */
	    $company_view = $this->auth->createPermission('company/view');
	    $this->auth->add($company_view);
	    $this->auth->addChild($administratorRole, $company_view);
	    $this->auth->addChild($managerRole, $company_view);

	    $company_index = $this->auth->createPermission('company/index');
	    $this->auth->add($company_index);
	    $this->auth->addChild($administratorRole, $company_index);
	    $this->auth->addChild($managerRole, $company_index);

	    $company_create = $this->auth->createPermission('company/create');
	    $this->auth->add($company_create);
	    $this->auth->addChild($administratorRole, $company_create);


	    $company_delete = $this->auth->createPermission('company/delete');
	    $this->auth->add($company_delete);
	    $this->auth->addChild($administratorRole, $company_delete);


	    $company_update = $this->auth->createPermission('company/update');
	    $this->auth->add($company_update);
	    $this->auth->addChild($administratorRole, $company_update);
	    $this->auth->addChild($managerRole, $company_update);


	    /**
	     * Настройка сисетмы
	     */
	    $settings_view = $this->auth->createPermission('settings/view');
	    $this->auth->add($settings_view);
	    $this->auth->addChild($administratorRole, $settings_view);

	    $settings_update = $this->auth->createPermission('settings/update');
	    $this->auth->add($settings_update);
	    $this->auth->addChild($administratorRole, $settings_update);


	    /**
	     * Дщlogin logout
	     */
	    $sign_in_login = $this->auth->createPermission('sign-in/login');
	    $this->auth->add($sign_in_login);
	    $this->auth->addChild($administratorRole, $sign_in_login);

	    $sign_in_logout = $this->auth->createPermission('sign-in/logout');
	    $this->auth->add($sign_in_logout);
	    $this->auth->addChild($administratorRole, $sign_in_logout);

	    $sign_in_account = $this->auth->createPermission('sign-in/account');
	    $this->auth->add($sign_in_account);
	    $this->auth->addChild($administratorRole, $sign_in_account);

	    $sign_in_avatar_upload = $this->auth->createPermission('sign-in/avatar-upload');
	    $this->auth->add($sign_in_avatar_upload);
	    $this->auth->addChild($administratorRole, $sign_in_avatar_upload);


	    /**
	     * Конференции
	     */
	    $conference_view = $this->auth->createPermission('conference/view');
	    $this->auth->add($conference_view);
	    $this->auth->addChild($administratorRole, $conference_view);
	    $this->auth->addChild($doctorRole, $conference_view);

	    $conference_index = $this->auth->createPermission('conference/index');
	    $this->auth->add($conference_index);
	    $this->auth->addChild($administratorRole, $conference_index);
	    $this->auth->addChild($doctorRole, $conference_index);


	    /**
	     * Вопросы
	     */
	    $questions_view = $this->auth->createPermission('questions/view');
	    $this->auth->add($questions_view);
	    $this->auth->addChild($administratorRole, $questions_view);

	    $questions_index = $this->auth->createPermission('questions/index');
	    $this->auth->add($questions_index);
	    $this->auth->addChild($administratorRole, $questions_index);

	    $questions_create = $this->auth->createPermission('questions/create');
	    $this->auth->add($questions_create);
	    $this->auth->addChild($administratorRole, $questions_create);

	    $questions_delete = $this->auth->createPermission('questions/delete');
	    $this->auth->add($questions_delete);
	    $this->auth->addChild($administratorRole, $questions_delete);

	    $questions_update = $this->auth->createPermission('questions/update');
	    $this->auth->add($questions_update);
	    $this->auth->addChild($administratorRole, $questions_update);


	    /**
	     * Терминалы
	     */
	    $med_terminals_view = $this->auth->createPermission('med-terminals/view');
	    $this->auth->add($med_terminals_view);
	    $this->auth->addChild($administratorRole, $med_terminals_view);

	    $med_terminals_index = $this->auth->createPermission('med-terminals/index');
	    $this->auth->add($med_terminals_index);
	    $this->auth->addChild($administratorRole, $med_terminals_index);

	    $med_terminals_create = $this->auth->createPermission('med-terminals/create');
	    $this->auth->add($med_terminals_create);
	    $this->auth->addChild($administratorRole, $med_terminals_create);

	    $med_terminals_delete = $this->auth->createPermission('med-terminals/delete');
	    $this->auth->add($med_terminals_delete);
	    $this->auth->addChild($administratorRole, $med_terminals_delete);

	    $med_terminals_update = $this->auth->createPermission('med-terminals/update');
	    $this->auth->add($med_terminals_update);
	    $this->auth->addChild($administratorRole, $med_terminals_update);


	    /**
	     * История баланса
	     */
	    $balance_history_index = $this->auth->createPermission('balance-history/index');
	    $this->auth->add($balance_history_index);
	    $this->auth->addChild($administratorRole, $balance_history_index);
	    $this->auth->addChild($managerRole, $company_create);

	    $company_update_balance = $this->auth->createPermission('company/update-balance');
	    $this->auth->add($company_update_balance);
	    $this->auth->addChild($administratorRole, $company_update_balance);




	    /**
	     * Должности
	     */
	    $position_index = $this->auth->createPermission('position/index');
	    $this->auth->add($position_index);
	    $this->auth->addChild($administratorRole, $position_index);

	    $position_create = $this->auth->createPermission('position/create');
	    $this->auth->add($position_create);
	    $this->auth->addChild($administratorRole, $position_create);

	    $position_update = $this->auth->createPermission('position/update');
	    $this->auth->add($position_update);
	    $this->auth->addChild($administratorRole, $position_update);

	    $position_view = $this->auth->createPermission('position/view');
	    $this->auth->add($position_view);
	    $this->auth->addChild($administratorRole, $position_view);


	    /**
	     * Должности компании
	     */
	    $position_company_index = $this->auth->createPermission('position-company/index');
	    $this->auth->add($position_company_index);
	    $this->auth->addChild($administratorRole, $position_company_index);
	    $this->auth->addChild($managerRole, $position_company_index);

	    $position_company_create = $this->auth->createPermission('position-company/create');
	    $this->auth->add($position_company_create);
	    $this->auth->addChild($administratorRole, $position_company_create);
	    $this->auth->addChild($managerRole, $position_company_create);

	    $position_company_update = $this->auth->createPermission('position-company/update');
	    $this->auth->add($position_company_update);
	    $this->auth->addChild($administratorRole, $position_company_update);
	    $this->auth->addChild($managerRole, $position_company_update);

	    $position_company_view = $this->auth->createPermission('position-company/view');
	    $this->auth->add($position_company_view);
	    $this->auth->addChild($administratorRole, $position_company_view);
	    $this->auth->addChild($managerRole, $position_company_view);


	    /**
	     * Виртуальные устройства
	     */
	    $device_index = $this->auth->createPermission('device/index');
	    $this->auth->add($device_index);
	    $this->auth->addChild($administratorRole, $device_index);


	    $device_create = $this->auth->createPermission('device/create');
	    $this->auth->add($device_create);
	    $this->auth->addChild($administratorRole, $device_create);


	    $device_update = $this->auth->createPermission('device/update');
	    $this->auth->add($device_update);
	    $this->auth->addChild($administratorRole, $device_update);


	    $device_view = $this->auth->createPermission('device/view');
	    $this->auth->add($device_view);
	    $this->auth->addChild($administratorRole, $device_view);





    }

    public function down()
    {
//        $this->auth->remove($this->auth->getPermission('loginToBackend'));
//        $this->auth->remove($this->auth->getPermission('timeline-event/index'));
//        $this->auth->remove($this->auth->getPermission('user/view'));
    }
}
