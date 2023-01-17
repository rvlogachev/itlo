<?php
$config = [
    'modules' => [

        'cms' => [
            'class' => '\common\modules\cms\Module',
        ],
        'datecontrol' => [
            'class' => 'common\modules\cms\modules\datecontrol\Module',
        ],
        'ajaxfileupload' => [
            'class' => '\common\modules\cms\modules\ajaxfileupload\AjaxFileUploadModule',
        ],
        'api' => [
            'class' => common\modules\api\Module::class
        ],
    ],

];



return $config;
