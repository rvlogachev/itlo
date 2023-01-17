<?php

namespace backend\models;

use common\models\User;
use Faker\Provider\Uuid;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Create user form
 */
class UserForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public $roles;

    public $company_id;
    public $type_id;
    public $uid;
    public $id;

    private $model;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
	        [['type_id' ], 'required'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id' => $this->getModel()->id]]);
                }
            }],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class, 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id' => $this->getModel()->id]]);
                }
            }],

            ['password', 'required', 'on' => 'create'],
            ['password', 'string', 'min' => 6],

            [['status'], 'integer'],
            [['roles'], 'each',
                'rule' => ['in', 'range' => ArrayHelper::getColumn(
                    Yii::$app->authManager->getRoles(),
                    'name'
                )]
            ],

            /* */
            [['type_id'], 'string'],
            [['company_id'], 'safe']
        ];
    }

    /**
     * @return User
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new User();
        }
        return $this->model;
    }

    /**
     * @param User $model
     * @return mixed
     */
    public function setModel($model)
    {
    	$this->id = $model->id;
        $this->username = $model->username;
        $this->email = $model->email;
        $this->status = $model->status;
        $this->model = $model;

//        $this->roles = ArrayHelper::getColumn(
//            Yii::$app->authManager->getRolesByUser($model->getId()),
//            'name'
//        );




	    // $this->company_id = $model->company_id;
        $this->type_id = $model->type_id;
        return $this->model;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'email' => Yii::t('common', 'Email'),
            'status' => 'Статус',
            'password' => 'Пароль',
            'roles' => 'Роли',
            'company_id' => Yii::t('common', 'Компания'),
        ];
    }

    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function save()
    {
        if ($this->validate()) {
            $model = $this->getModel();
            $isNewRecord = $model->getIsNewRecord();
            $model->username = $this->username;
            $model->email = $this->email;
            $model->status = $this->status;

            $model->company_id = $this->company_id;
            $model->type_id = $this->type_id;




            if ($this->password) {
                $model->setPassword($this->password);
            }
            if (!$model->save()) {
                throw new Exception('Model not saved');
            }
            if ($isNewRecord) {
				$model->addCompany($model->getId(), $this->company_id);
                $model->afterSignup();
            }else{
	            $model->clearCompany(Yii::$app->request->get('id'));
	            $model->addCompany(Yii::$app->request->get('id'), $this->company_id);
            }

            $auth = Yii::$app->authManager;
            $auth->revokeAll($model->getId());
	        switch ($model->type_id) {
		        case 1:
			        $auth->assign($auth->getRole(User::ROLE_USER), $model->getId());
			        break;
		        case 2:
			        $auth->assign($auth->getRole(User::ROLE_DOCTOR), $model->getId());
			        break;
		        case 3:
			        $auth->assign($auth->getRole(User::ROLE_MANAGER_HR), $model->getId());
			        break;
		        case 4:
			        $auth->assign($auth->getRole(User::ROLE_ADMIN), $model->getId());
			        break;
	        }
//            if ($this->roles && is_array($this->roles)) {
//                foreach ($this->roles as $role) {
//                    $auth->assign($auth->getRole($role), $model->getId());
//                }
//            }
            return !$model->hasErrors();
        }
        return null;
    }



}
