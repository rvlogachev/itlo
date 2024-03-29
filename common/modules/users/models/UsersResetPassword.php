<?php
namespace common\modules\users\models;

use Yii;
use yii\base\InvalidArgumentException;
use yii\base\Model;
use common\modules\users\models\Users;


class UsersResetPassword extends Model
{

    /**
     * @var string, user password
     */
    public $password;

    /**
     * @var \common\modules\users\models\User
     */
    private $_user;

    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @param boolean $silent to check the muted mode
     * @throws InvalidArgumentException if token is empty or not valid
     */
    public function __construct($token, $config = [], $silent = false)
    {
        if (empty($token) || !is_string($token)) {
            if ($silent)
                return false;
            else
                throw new InvalidArgumentException(Yii::t('app/modules/users', 'Password reset token cannot be blank.'));
        }

        $this->_user = Users::findByPasswordResetToken($token);
        if (!$this->_user) {
            if ($silent)
                return false;
            else
                throw new InvalidArgumentException(Yii::t('app/modules/users', 'Wrong password reset token.'));
        }

        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 8, 'max' => 24],
            ['password', 'match', 'pattern' => '/(.*[A-Z]){1,}.*/', 'message' => Yii::t('app/modules/users', 'The password must contains min 1 char in uppercase.')],
            ['password', 'match', 'pattern' => '/(.*[\d]){1,}.*/', 'message' => Yii::t('app/modules/users', 'The password must contains min 1 char as number.')],
            ['password', 'match', 'pattern' => '/(.*[a-z]){1,}.*/', 'message' => Yii::t('app/modules/users', 'The password must contains min 1 char in lowercase.')],
            ['password', 'match', 'pattern' => '/(.*[\W]){1,}.*/', 'message' => Yii::t('app/modules/users', 'The password must contents min 1 special char.')],
        ];
    }

    /**
     * Сhecks user is found
     *
     * @return boolean
     */
    public function userIsFound()
    {
        if ($this->_user)
            return true;
        else
            return false;
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();
        return $user->save(false);
    }
}