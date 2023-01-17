<?php

namespace common\modules\users\models;

use common\modules\cms\components\Cms;
use common\modules\cms\models\behaviors\HasRelatedProperties;
use common\modules\cms\models\behaviors\HasStorageFile;
use common\modules\cms\models\behaviors\traits\HasRelatedPropertiesTrait;
use common\modules\cms\models\CmsContentElement;
use common\modules\cms\models\CmsContentElement2cmsUser;
use common\modules\cms\models\CmsStorageFile;
use common\modules\cms\models\CmsUserEmail;
use common\modules\cms\models\CmsUserProperty;
use common\modules\cms\models\CmsUserUniversalProperty;
use common\modules\cms\models\Core;
use common\modules\cms\models\StorageFile;
use common\modules\cms\modules\authclient\models\UserAuthClient;
use common\modules\cms\rbac\models\CmsAuthAssignment;
use common\modules\cms\validators\PhoneValidator;
use common\modules\helpers\src\ArrayHelper;
use common\modules\helpers\src\StringHelper;
use Imagine\Image\ManipulatorInterface;
use skeeks\cms\models\CmsUserPhone;
use Yii;
use yii\base\Exception;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;


/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $created_by
 *
 *
 * @property integer $image_id
 * @property integer $first_name
 * @property integer $last_name
 * @property integer $patronymic
 *
 * @property string $gender
 * @property string $active

 * @property integer $logged_at
 * @property integer $last_activity_at
 * @property integer $last_admin_activity_at
 * @property string $phone
 * @property integer $email_is_approved
 * @property integer $phone_is_approved
 *
 * ***
 *
 * @property string $name
 * @property string $lastActivityAgo
 * @property string $lastAdminActivityAgo
 *
 * @property CmsStorageFile $image
 * @property string $avatarSrc
 * @property string $profileUrl
 *
 * @property CmsUserEmail[] $cmsUserEmails
 * @property CmsUserPhone[] $cmsUserPhones
 * @property UserAuthClient[] $cmsUserAuthClients
 *
 * @property \yii\rbac\Role[] $roles
 * @property []   $roleNames
 *
 * @property string $displayName
 * @property string $shortDisplayName
 * @property string $isOnline Пользователь онлайн?
 *
 * @property CmsContentElement2cmsUser[] $cmsContentElement2cmsUsers
 * @property CmsContentElement[] $favoriteCmsContentElements
 * @property CmsAuthAssignment[] $cmsAuthAssignments
 *
 */

class Users extends Core implements IdentityInterface
{
    use HasRelatedPropertiesTrait;
    /**
     * Ticket status
     * const, int: 0 - Inactive user, 10 - Active user, 20 - Blocked user
     */
    const USR_STATUS_DELETED = 0;
    const USR_STATUS_WAITING = 5;
    const USR_STATUS_ACTIVE = 10;
    const USR_STATUS_BLOCKED = 15;

    const USR_UPDATE_OR_CREATE_PASSWD = 'manage_user_password';

    public $is_online;
    public $role;
    public $password;
    public $password_confirm;

    /**
     * Логины которые нельзя удалять, и нельзя менять
     * @return array
     */
    public static function getProtectedUsernames()
    {
        return ['root', 'admin'];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
    }


    /**
     * @inheritdoc
     */
   /* public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            TimestampBehavior::class,

            HasStorageFile::class =>
                [
                    'class' => HasStorageFile::class,
                    'fields' => ['image_id']
                ],

            HasRelatedProperties::class =>
                [
                    'class' => HasRelatedProperties::class,
                    'relatedElementPropertyClassName' => CmsUserProperty::class,
                    'relatedPropertyClassName' => CmsUserUniversalProperty::class,
                ],

        ]);
    }*/

    /**
     * @inheritdoc
     */
  /*  public function rules()
    {
        return [
            ['active', 'default', 'value' => Cms::BOOL_Y],
            ['gender', 'default', 'value' => 'men'],
            ['gender', 'in', 'range' => ['men', 'women']],

            [['created_at', 'updated_at', 'email_is_approved', 'phone_is_approved'], 'integer'],

            [['image_id'], 'safe'],
            [
                ['image_id'],
                \common\modules\cms\validators\FileValidator::class,
                'skipOnEmpty' => false,
                'extensions' => ['jpg', 'jpeg', 'gif', 'png'],
                'maxFiles' => 1,
                'maxSize' => 1024 * 1024 * 5,
                'minSize' => 1024,
            ],

            [['gender'], 'string'],
            [
                ['username', 'password_hash', 'password_reset_token', 'email', 'first_name', 'last_name', 'patronymic'],
                'string',
                'max' => 255
            ],
            [['auth_key'], 'string', 'max' => 32],

            [['phone'], 'string', 'max' => 64],
            [['phone'], PhoneValidator::class],
            [['phone'], 'unique'],
            [['phone', 'email'], 'default', 'value' => null],


            [['email'], 'unique'],
            [['email'], 'email'],

            //[['username'], 'required'],
            ['username', 'string', 'min' => 3, 'max' => 25],
            [['username'], 'unique'],
            [['username'], \common\modules\cms\validators\LoginValidator::class],

            [['logged_at'], 'integer'],
            [['last_activity_at'], 'integer'],
            [['last_admin_activity_at'], 'integer'],

            [
                ['username'],
                'default',
                'value' => function(self $model) {
                    $userLast = static::find()->orderBy("id DESC")->limit(1)->one();
                    return "id" . ($userLast->id + 1);
                }
            ],

            [['email_is_approved', 'phone_is_approved'], 'default', 'value' => 0],

            [
                ['auth_key'],
                'default',
                'value' => function(self $model) {
                    return \Yii::$app->security->generateRandomString();
                }
            ],

            [
                ['password_hash'],
                'default',
                'value' => function(self $model) {
                    return \Yii::$app->security->generatePasswordHash(\Yii::$app->security->generateRandomString());
                }
            ],

            [['roleNames'], 'safe'],
            [['roleNames'], 'default', 'value' => \Yii::$app->cms->registerRoles]
        ];
    }*/

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => function() {
                    return date("Y-m-d H:i:s");
                }
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['created_at', 'updated_at', 'lastseen_at'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['status','created_by','updated_by'], 'integer'],
            [['status'], 'default', 'value' => self::USR_STATUS_ACTIVE],
            [['status'], 'in', 'range' => [self::USR_STATUS_DELETED, self::USR_STATUS_WAITING, self::USR_STATUS_ACTIVE, self::USR_STATUS_BLOCKED]],

            [['role'], 'in', 'range' => $this->getAllRoles(false), 'on' => self::USR_UPDATE_OR_CREATE_PASSWD],
            [['password', 'password_confirm'], 'string', 'min' => 8, 'max' => 24, 'on' => self::USR_UPDATE_OR_CREATE_PASSWD],
            [['password', 'password_confirm'], 'match', 'pattern' => '/(.*[A-Z]){1,}.*/', 'message' => Yii::t('app/modules/users', 'The password must contains min 1 char in uppercase.'), 'on' => self::USR_UPDATE_OR_CREATE_PASSWD],
            [['password', 'password_confirm'], 'match', 'pattern' => '/(.*[\d]){1,}.*/', 'message' => Yii::t('app/modules/users', 'The password must contains min 1 char as number.'), 'on' => self::USR_UPDATE_OR_CREATE_PASSWD],
            [['password', 'password_confirm'], 'match', 'pattern' => '/(.*[a-z]){1,}.*/', 'message' => Yii::t('app/modules/users', 'The password must contains min 1 char in lowercase.'), 'on' => self::USR_UPDATE_OR_CREATE_PASSWD],
            [['password', 'password_confirm'], 'match', 'pattern' => '/(.*[\W]){1,}.*/', 'message' => Yii::t('app/modules/users', 'The password must contents min 1 special char.'), 'on' => self::USR_UPDATE_OR_CREATE_PASSWD],
            [['password_confirm'], 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app/modules/users', 'Password and password confirmation must match.'), 'on' => self::USR_UPDATE_OR_CREATE_PASSWD],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if (
            $this->scenario == self::USR_UPDATE_OR_CREATE_PASSWD &&
            (($authManager = Yii::$app->getAuthManager()) && Yii::$app->user->can('admin')) &&
            isset($this->role)
        ) {
            $authManager->revokeAll($this->id);
            $role = $authManager->getRole(trim($this->role));
            $authManager->assign($role, $this->id);
        }

    }

    public function afterFind()
    {
        parent::afterFind();
        $this->role = $this->getDefaultRole(false);

        // Check only for current authorized user
        if (Yii::$app->getUser()) {
            if ($this->id == Yii::$app->getUser()->getId()) {
                $this->is_online = $this->getIsOnline();
            }
        }
    }



    /**
     * {@inheritdoc}
     */
    public function afterDelete()
    {
        parent::afterDelete();
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        if (
            $this->scenario == self::USR_UPDATE_OR_CREATE_PASSWD &&
            (
                $this->id == Yii::$app->user->id ||
                Yii::$app->user->can('admin')
            ) &&
            (!empty($this->password) && !empty($this->password_confirm))
        ) {
            $this->setPassword($this->password);
            $this->generateAuthKey();
            $this->removePasswordResetToken();
        }

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/modules/users', 'ID'),
            'username' => Yii::t('app/modules/users', 'Username'),
            'auth_key' => Yii::t('app/modules/users', 'Auth key'),
            'password_hash' => Yii::t('app/modules/users', 'Password hash'),
            'password_reset_token' => Yii::t('app/modules/users', 'Password reset token'),
            'email' => Yii::t('app/modules/users', 'Email'),
            'role' => Yii::t('app/modules/users', 'Role'),
            'is_online' => Yii::t('app/modules/users', 'Is online?'),
            'password' => Yii::t('app/modules/users', 'Password'),
            'password_confirm' => Yii::t('app/modules/users', 'Password confirm'),
            'status' => Yii::t('app/modules/users', 'Status'),
            'created_at' => Yii::t('app/modules/users', 'Created at'),
            'updated_at' => Yii::t('app/modules/users', 'Updated at'),
            'roles' => Yii::t('app/modules/users', 'Roles'),
            'permissions' => Yii::t('app/modules/users', 'Permissions'),
            'assignments' => Yii::t('app/modules/users', 'Assignments'),

            'phone' => Yii::t('skeeks/cms', 'Phone'),
            'active' => Yii::t('skeeks/cms', 'Active'),

            'name' => \Yii::t('skeeks/cms/user', 'Name'), //Yii::t('skeeks/cms', 'Name???'),
            'first_name' => \Yii::t('skeeks/cms', 'First name'),
            'last_name' => \Yii::t('skeeks/cms', 'Last name'),
            'patronymic' => \Yii::t('skeeks/cms', 'Patronymic'),
            'gender' => Yii::t('skeeks/cms', 'Gender'),
            'logged_at' => Yii::t('skeeks/cms', 'Logged At'),
            'last_activity_at' => Yii::t('skeeks/cms', 'Last Activity At'),
            'last_admin_activity_at' => Yii::t('skeeks/cms', 'Last Activity In The Admin At'),
            'image_id' => Yii::t('skeeks/cms', 'Image'),
            'roleNames' => Yii::t('skeeks/cms', 'Группы'),
            'email_is_approved' => Yii::t('skeeks/cms', 'Email is approved'),
            'phone_is_approved' => Yii::t('skeeks/cms', 'Phone is approved'),
        ];
    }







    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token))
            return null;

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::USR_STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token))
            return false;

        // Get current module
        if (Yii::$app->hasModule('admin/users'))
            $module = Yii::$app->getModule('admin/users');
        else
            $module = Yii::$app->getModule('users');

//        $expire = Yii::$app->cms->passwordResetTokenExpire;
//        $parts = explode('_', $token);
//        $timestamp = (int)end($parts);
//        return $timestamp + $expire >= time();

        // Get time to expire reset token
        if($module->passwordReset["resetTokenExpire"])
            $expire = intval($module->passwordReset["resetTokenExpire"]);
        else
            $expire = Yii::$app->params['user.passwordResetTokenExpire'];

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Return username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Return user e-mail
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllUsers()
    {
        return $this->findAll(['status' => Users::USR_STATUS_ACTIVE]);
    }



    /**
     * @param bool $instance
     * @return int|mixed|string|null
     */
    public function getDefaultRole($instance = true)
    {
        $roles = $this->getRoles();
        if ($roles)
            return ($instance) ? end($roles) : ArrayHelper::keyLast($roles);
        else
            return null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssignments()
    {
        $authManager = Yii::$app->getAuthManager();
        if ($authManager)
            return $authManager->getAssignments($this->id); //@TODO: must returned ActiveQuery
        else
            return null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermissions()
    {
        $authManager = Yii::$app->getAuthManager();
        if ($authManager)
            return $authManager->getPermissionsByUser($this->id); //@TODO: must returned ActiveQuery
        else
            return null;
    }

    /**
     * @return array
     */
    public function getStatusesList($allStatuses = false)
    {
        $list = [
            self::USR_STATUS_DELETED => Yii::t('app/modules/users','Deleted'),
            self::USR_STATUS_WAITING => Yii::t('app/modules/users','Waiting'),
            self::USR_STATUS_ACTIVE => Yii::t('app/modules/users','Active'),
            self::USR_STATUS_BLOCKED => Yii::t('app/modules/users','Blocked'),
        ];

        if ($allStatuses)
            $list = ArrayHelper::merge([
                '*' => Yii::t('app/modules/users', 'All statuses')
            ], $list);

        return $list;
    }

    public function getAllRoles($instance = true)
    {
        $authManager = Yii::$app->getAuthManager();
        if ($authManager){
            return ($instance) ? $authManager->roles : array_keys($authManager->roles);
        } else
            return null;
    }

    /**
     * @return array
     */
    public function getRolesList($allRoles = false)
    {

        $list = [];
        if ($roles = $this->getAllRoles(false)) {
            $list = array_reverse(array_combine($roles, $roles));
        }

        if ($allRoles)
            $list = ArrayHelper::merge([
                '*' => Yii::t('app/modules/users', 'All roles')
            ], $list);

        return $list;
    }


    /**
     * Пользователь онлайн?
     * @return bool
     */
    public function getIsOnline()
    {
        if (strtotime('-1 minutes', strtotime(date('Y-m-d H:i:s'))) <= strtotime($this->lastseen_at))
            $this->is_online = true;
        else
            $this->is_online = false;

        return $this->is_online;
    }

//    public function getIsOnline()
//    {
//        $time = \Yii::$app->formatter->asTimestamp(time()) - $this->last_activity_at;
//        if ($time <= \Yii::$app->cms->userOnlineTime)
//        {
//            return true;
//        } else
//        {
//            return false;
//        }
//    }

    /**
     * Return stats count by all users
     *
     * @return array|null
     */
    public static function getStatsCount($onlyActive = true, $asArray = false) {
        $counts = static::find()
            ->select([new \yii\db\Expression('SUM( CASE WHEN `created_at` >= TIMESTAMP(CURRENT_TIMESTAMP() - INTERVAL 1 DAY) THEN 1 END ) AS count')])
            ->addSelect([new \yii\db\Expression('SUM( CASE WHEN `lastseen_at` >= TIMESTAMP(CURRENT_TIMESTAMP() - INTERVAL 1 MINUTE) THEN 1 END ) AS online')])
            ->addSelect([new \yii\db\Expression('SUM( CASE WHEN `id` > 0 THEN 1 END ) AS total')]);

        if ($onlyActive)
            $counts->where(['status' => static::USR_STATUS_ACTIVE]);

        if ($asArray)
            return $counts->asArray()->one();

        return $counts->one();
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->on(self::EVENT_BEFORE_UPDATE, [$this, "_cmsCheckBeforeSave"]);

        $this->on(self::EVENT_AFTER_INSERT, [$this, "_cmsAfterSave"]);
        $this->on(self::EVENT_AFTER_UPDATE, [$this, "_cmsAfterSave"]);

        $this->on(self::EVENT_BEFORE_DELETE, [$this, "checkDataBeforeDelete"]);
    }

    public function _cmsCheckBeforeSave($e) {
        if (!\Yii::$app->user && !\Yii::$app->user->identity) {
            return true;
        }

        if ($this->active == "N" && $this->id == \Yii::$app->user->identity->id) {
            throw new Exception(\Yii::t('skeeks/cms', 'Нельзя деактивировать себя'));
        }
    }

    public function _cmsAfterSave($e)
    {
        if ($this->_roleNames !== null) {
            if ($this->roles) {
                foreach ($this->roles as $roleExist) {
                    if (!in_array($roleExist->name, (array)$this->_roleNames)) {
                        \Yii::$app->authManager->revoke($roleExist, $this->id);
                    }
                }
            }

            foreach ((array)$this->_roleNames as $roleName) {
                if ($role = \Yii::$app->authManager->getRole($roleName)) {
                    try {
                        //todo: добавить проверку
                        \Yii::$app->authManager->assign($role, $this->id);
                    } catch (\Exception $e) {
                        \Yii::error("Ошибка назначения роли: " . $e->getMessage(), self::class);
                        //throw $e;
                    }
                } else {
                    \Yii::warning("Роль {$roleName} не зарегистрированна в системе", self::class);
                }
            }
        }
    }

    /**
     * @throws Exception
     */
    public function checkDataBeforeDelete($e)
    {
        if (in_array($this->username, static::getProtectedUsernames())) {
            throw new Exception(\Yii::t('skeeks/cms', 'This user can not be removed'));
        }

        if ($this->id == \Yii::$app->user->identity->id) {
            throw new Exception(\Yii::t('skeeks/cms', 'You can not delete yourself'));
        }
    }




    public function extraFields()
    {
        return [
            'displayName',
        ];
    }




    /**
     * Установка последней активности пользователя. Больше чем в настройках.
     * @return $this
     */
    public function lockAdmin()
    {
        $this->last_admin_activity_at = \Yii::$app->formatter->asTimestamp(time()) - (\Yii::$app->admin->blockedTime + 1);
        $this->save(false);

        return $this;
    }

    /**
     * Время проявления последней активности на сайте
     *
     * @return int
     */
    public function getLastAdminActivityAgo()
    {
        $now = \Yii::$app->formatter->asTimestamp(time());
        return (int)($now - (int)$this->last_admin_activity_at);
    }

    /**
     * Обновление времени последней актиности пользователя.
     * Только в том случае, если время его последней актиности больше 10 сек.
     * @return $this
     */
    public function updateLastAdminActivity()
    {
        $now = \Yii::$app->formatter->asTimestamp(time());

        if (!$this->lastAdminActivityAgo || $this->lastAdminActivityAgo > 10) {
            $this->last_activity_at = $now;
            $this->last_admin_activity_at = $now;

            $this->save(false);
        }

        return $this;
    }


    /**
     * Время проявления последней активности на сайте
     *
     * @return int
     */
    public function getLastActivityAgo()
    {
        $now = \Yii::$app->formatter->asTimestamp(time());
        return (int)($now - (int)$this->last_activity_at);
    }

    /**
     * Обновление времени последней актиности пользователя.
     * Только в том случае, если время его последней актиности больше 10 сек.
     * @return $this
     */
    public function updateLastActivity()
    {
        $now = \Yii::$app->formatter->asTimestamp(time());

        if (!$this->lastActivityAgo || $this->lastActivityAgo > 10) {
            $this->last_activity_at = $now;
            $this->save(false);
        }

        return $this;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(StorageFile::class, ['id' => 'image_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStorageFiles()
    {
        return $this->hasMany(StorageFile::class, ['created_by' => 'id']);
    }




    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->name ? $this->name : $this->username;
    }


    /**
     *
     * TODO: Is depricated > 2.7.1
     *
     * @param string $action
     * @param array $params
     * @return string
     */
    public function getPageUrl($action = 'view', $params = [])
    {
        return $this->getProfileUrl($action, $params);
    }


    /**
     * @param string $action
     * @param array $params
     * @return string
     */
    public function getProfileUrl($action = 'view', $params = [])
    {
        $params = ArrayHelper::merge([
            "cms/user/" . $action,
            "username" => $this->username
        ], $params);

        return \Yii::$app->urlManager->createUrl($params);
    }

    /**
     * @return string
     * @deprecated
     */
    public function getName()
    {
        $data = [];

        if ($this->last_name) {
            $data[] = $this->last_name;
        }

        if ($this->first_name) {
            $data[] = $this->first_name;
        }

        if ($this->patronymic) {
            $data[] = $this->patronymic;
        }

        return $data ? implode(" ", $data) : null;
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'active' => Cms::BOOL_Y]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException(\Yii::t('skeeks/cms', '"findIdentityByAccessToken" is not implemented.'));
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'active' => Cms::BOOL_Y]);
    }

    /**
     * Finds user by email
     *
     * @param $email
     * @return static
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'active' => Cms::BOOL_Y]);
    }

    /**
     * @param $phone
     * @return null|CmsUser
     */
    public static function findByPhone($phone)
    {
        return static::findOne(['phone' => $phone, 'active' => Cms::BOOL_Y]);

        return null;
    }


    /**
     * Поиск пользователя по email или логину
     * @param $value
     * @return User
     */
    public static function findByUsernameOrEmail($value)
    {
        if ($user = static::findByUsername($value)) {
            return $user;
        }

        if ($user = static::findByEmail($value)) {
            return $user;
        }

        return null;
    }

    /**
     * @param string|array $assignments
     * @return \common\modules\cms\query\CmsActiveQuery
     */
    public static function findByAuthAssignments($assignments) {
        return static::find()->joinWith('cmsAuthAssignments as cmsAuthAssignments')
            ->where(['cmsAuthAssignments.item_name' => $assignments]);
    }






    /**
     * Заполнить модель недостающими данными, которые необходимы для сохранения пользователя
     * @return $this
     */
    public function populate()
    {
        $password = \Yii::$app->security->generateRandomString(6);

        $this->generateUsername();
        $this->setPassword($password);
        $this->generateAuthKey();

        return $this;
    }









    /**
     * Генерация логина пользователя
     * @return $this
     */
    public function generateUsername()
    {
        /*if ($this->email)
        {
            $userName = \skeeks\cms\helpers\StringHelper::substr($this->email, 0, strpos() );
        }*/

        $userLast = static::find()->orderBy("id DESC")->limit(1)->one();
        $this->username = "id" . ($userLast->id + 1);

        if (static::find()->where(['username' => $this->username])->limit(1)->one()) {
            $this->username = $this->username . "_" . \common\modules\cms\helpers\StringHelper::substr(md5(time()), 0, 6);
        }

        return $this;
    }





    /**
     * @param int $width
     * @param int $height
     * @param $mode
     * @return mixed|null|string
     */
    public function getAvatarSrc($width = 50, $height = 50, $mode = ManipulatorInterface::THUMBNAIL_OUTBOUND)
    {
        if ($this->image) {
            return \Yii::$app->imaging->getImagingUrl($this->image->src,
                new \common\modules\cms\components\imaging\filters\Thumbnail([
                    'w' => $width,
                    'h' => $height,
                    'm' => $mode,
                ]));
        }
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsUserAuthClients()
    {
        return $this->hasMany(UserAuthClient::class, ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsUserEmails()
    {
        return $this->hasMany(CmsUserEmail::class, ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsUserPhones()
    {
        return $this->hasMany(CmsUserPhone::class, ['user_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsAuthAssignments()
    {
        return $this->hasMany(CmsAuthAssignment::class, ['user_id' => 'id']);
    }


    /**
     * @param bool $instance
     * @return array|\yii\rbac\Role[]|null
     */
    public function getRoles($instance = true)
    {
        $authManager = Yii::$app->getAuthManager();
        if ($authManager)
            return ($instance) ? $authManager->getRolesByUser($this->id) : array_keys($authManager->getRolesByUser($this->id));
        else
            return null;
    }

    protected $_roleNames = null;

    /**
     * @return array
     */
    public function getRoleNames()
    {
        if ($this->_roleNames !== null) {
            return $this->_roleNames;
        }

        $this->_roleNames = (array)ArrayHelper::map($this->roles, 'name', 'name');
        return $this->_roleNames;
    }

    /**
     * @param array $roleNames
     * @return $this
     */
    public function setRoleNames($roleNames = [])
    {
        $this->_roleNames = $roleNames;

        return $this;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsContentElement2cmsUsers()
    {
        return $this->hasMany(CmsContentElement2cmsUser::class, ['cms_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoriteCmsContentElements()
    {
        return $this->hasMany(CmsContentElement::class, ['id' => 'cms_content_element_id'])
            ->via('cmsContentElement2cmsUsers');
    }




    /**
     * @return string
     */
    public function getShortDisplayName()
    {
        if ($this->last_name || $this->first_name) {
            return implode(" ", [$this->last_name, $this->first_name]);
        } else {
            return $this->displayName;
        }
    }
}