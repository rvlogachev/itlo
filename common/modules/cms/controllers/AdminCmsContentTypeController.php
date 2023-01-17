<?php
namespace common\modules\cms\controllers;

use common\modules\cms\models\CmsContentType;
use common\modules\cms\modules\admin\controllers\AdminModelEditorController;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * Class AdminCmsContentTypeController
 * @package skeeks\cms\controllers
 */
class AdminCmsContentTypeController extends AdminModelEditorController
{
    public function init()
    {
        $this->name = \Yii::t('skeeks/cms', 'Content management');
        $this->modelShowAttribute = "name";
        $this->modelClassName = CmsContentType::class;

        parent::init();
    }
}
