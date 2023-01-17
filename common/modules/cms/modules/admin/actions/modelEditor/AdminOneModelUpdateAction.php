<?php
/**
 */
namespace common\modules\cms\modules\admin\actions\modelEditor;
use common\modules\backend\actions\BackendModelUpdateAction;
use common\modules\cms\helpers\RequestResponse;
use yii\base\InvalidParamException;
use yii\behaviors\BlameableBehavior;
use yii\web\Response;

/**
 * Class AdminOneModelUpdateAction
 * @package skeeks\cms\modules\admin\actions\modelEditor
 */
class AdminOneModelUpdateAction extends BackendModelUpdateAction
{
    //TODO: is deprecated;
    //TODO: not used visible;
    public $visible = true;
}