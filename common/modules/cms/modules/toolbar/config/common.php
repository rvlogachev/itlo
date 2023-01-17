<?php
return [

    'components' => [

        'i18n' => [
            'translations' => [
                'common/modules/toolbar' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/modules/cms/toolbar/messages',
                    'fileMap'  => [
                        'skeeks/toolbar' => 'main.php',
                    ],
                ],
            ],
        ],
    ],
];