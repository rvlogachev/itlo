<?php

use common\models\User;
use common\rbac\Migration;

class m150625_214101_roles extends Migration
{
    /**
     * @return bool|void
     * @throws \yii\base\Exception
     */
    public function up()
    {
        $this->auth->removeAll();

        $doctor = $this->auth->createRole(User::ROLE_DOCTOR);
        $this->auth->add($doctor);

        $manager = $this->auth->createRole(User::ROLE_MANAGER_HR);
        $this->auth->add($manager);


        $admin = $this->auth->createRole(User::ROLE_ADMIN);
        $this->auth->add($admin);


        $this->auth->assign($admin, 1);
        $this->auth->assign($doctor, 2);

    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->auth->remove($this->auth->getRole(User::ROLE_ADMINISTRATOR));
        $this->auth->remove($this->auth->getRole(User::ROLE_MANAGER_HR));
        $this->auth->remove($this->auth->getRole(User::ROLE_DOCTOR));
    }
}
