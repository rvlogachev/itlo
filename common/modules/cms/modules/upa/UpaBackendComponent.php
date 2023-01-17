<?php
namespace common\modules\cms\modules\upa;

use common\modules\backend\BackendComponent;
use yii\base\Theme;

/**
 * Class UpaBackendComponent
 * @package skeeks\cms\upa
 */
class UpaBackendComponent extends BackendComponent
{
    /**
     * @var string
     */
    public $controllerPrefix = "upa";

    /**
     * @var array
     */
    public $urlRule = [
        'urlPrefix' => '~upa',
    ];

    /*protected $_menu = [
        'data' => [
            'personal' =>
            [
                'name' => 'Настройки',

                'items' => [
                    [
                        'url'   => ['/personal-info/index'],
                        'name'   => 'Личные настройки',
                    ],
                ],
            ],
        ]
    ];*/
}