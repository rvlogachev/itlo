<?php

namespace common\modules\cms\controllers;

use common\modules\cms\helpers\UrlHelper;
use common\modules\cms\models\CmsContent;
use common\modules\cms\modules\admin\controllers\AdminModelEditorController;

/**
 * Class AdminCmsContentTypeController
 * @package common\modules\cms\controllers
 */
class AdminCmsContentController extends AdminModelEditorController
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';

    public function init()
    {
        $this->name = \Yii::t('skeeks/cms', 'Content management');
        $this->modelShowAttribute = "name";
        $this->modelClassName = CmsContent::class;

        parent::init();
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        $contentTypePk = null;

        if ($this->model) {
            if ($contentType = $this->model->contentType) {
                $contentTypePk = $contentType->id;
            }
        }

        return UrlHelper::construct([
            "cms/admin-cms-content-type/update",
            'pk' => $contentTypePk
        ])->enableAdmin()->toString();
    }
}
