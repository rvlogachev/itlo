<?php
/**
 */

namespace common\modules\cms\validators;

use yii\validators\Validator;
use Exception;

/**
 * Class LoginValidator
 * @package skeeks\cms\validators
 */
class LoginValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $string = $model->{$attribute};

        if (!preg_match('/^[a-z]{1}[a-z0-9_]+$/', $string)) {
            $this->addError($model, $attribute, \Yii::t('skeeks/cms',
                'Use only letters (lowercase) and numbers. Must begin with a letter. Example {sample}',
                ['sample' => 'demo1']));
            return false;
        }
    }
}