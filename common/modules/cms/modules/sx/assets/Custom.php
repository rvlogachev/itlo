<?php
/**
 * Custom
 *
 */
namespace common\modules\cms\modules\sx\assets;
/**
 * Class Custom
 * @package skeeks\sx\assets
 */
class Custom extends BaseAsset
{
    public $js = [
        'js/Widget.js',
        'js/helpers/Helpers.js',
        'js/components/window/Window.js',
        'js/components/modal/Modal.js',
        'js/components/blocker/Blocker.js',
        'js/components/blocker/BlockerJqueryUi.js',
        'js/components/ajax-handlers/AjaxHandlerStandartRespose.js',
    ];

    public $depends = [
        'common\modules\cms\modules\sx\assets\Core',
        'common\modules\cms\modules\sx\assets\ComponentNotifyJgrowl',
        'common\modules\cms\modules\sx\assets\JqueryBlockUi',
    ];
}