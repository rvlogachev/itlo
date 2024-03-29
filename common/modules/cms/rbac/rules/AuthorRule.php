<?php
namespace common\modules\cms\rbac\rules;

use yii\rbac\Rule;

/**
 * Checks if authorID matches user passed via params
 */
class AuthorRule extends Rule
{
    const NAME = 'isAuthor';
    public $name = self::NAME;

    /**
     * @param string|integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        if (isset($params['model']) && isset($params['model']->created_by)) {
            return $params['model']->created_by == $user;
        }

        return false;
    }
}