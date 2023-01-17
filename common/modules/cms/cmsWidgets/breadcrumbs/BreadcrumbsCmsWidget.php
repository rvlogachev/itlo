<?php
namespace common\modules\cms\cmsWidgets\breadcrumbs;

use common\modules\cms\base\WidgetRenderable;

/**
 * Class breadcrumbs
 * @package skeeks\cms\cmsWidgets\Breadcrumbs
 */
class BreadcrumbsCmsWidget extends WidgetRenderable
{
    public static function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => \Yii::t('skeeks/cms', 'Breadcrumbs')
        ]);
    }
}