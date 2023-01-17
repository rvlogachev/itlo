<?php
namespace common\modules\cms\modules\toolbar\panels;

use common\modules\backend\BackendController;
use common\modules\cms\components\Cms;
use common\modules\cms\modules\toolbar\CmsToolbarPanel;
use Yii;
use yii\base\ViewEvent;
use yii\helpers\Html;
use yii\web\View;

/**
 * Class TemplatePanel
 * @package skeeks\cms\toolbar\panels
 */
class TemplatePanel extends CmsToolbarPanel
{
    public $_view_files = [];

    public function init()
    {
        parent::init();

        \Yii::$app->view->on(View::EVENT_AFTER_RENDER, function (ViewEvent $e) {
            if (\Yii::$app->controller instanceof BackendController) {
                return false;
            }

            if ($this->toolbar->editViewFiles == Cms::BOOL_Y && $this->toolbar->enabled && $this->isEnabled()) {

                if (strpos($e->viewFile, \Yii::getAlias('@vendor')) !== false) {
                    return;
                }

                $id = "sx-view-render-md5" . md5($e->viewFile);
                if (in_array($id, $this->toolbar->viewFiles)) {
                    return;
                }
                $this->_view_files[] = $e->viewFile;
                $this->toolbar->viewFiles[$id] = $id;

                $e->sender->registerJs(<<<JS
new sx.classes.toolbar.EditViewBlock({'id' : '{$id}'});
JS
                );
//\Yii::$app->view->registerCss(".sx-cms-toolbar-edit-view-block {display: table;}");

                $e->output = Html::tag('div', $e->output,
                    [
                        'class' => 'sx-cms-toolbar-edit-view-block',
                        'id' => $id,
                        'title' => "Двойной клик по блоку откроек окно управлния настройками",
                        'data' =>
                            [
                                'id' => $id,
                                'config-url' => \common\modules\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-tools/view-file-edit'])
                                    ->merge([
                                        "root-file" => $e->viewFile
                                    ])
                                    ->enableEmptyLayout()
                                    ->url
                            ]
                    ]);
            }
        });

    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return \Yii::$app->user->can(\common\modules\cms\rbac\CmsManager::PERMISSION_EDIT_VIEW_FILES);
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return \Yii::t('skeeks/toolbar', 'Templates management');
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render('@common/modules/cms/modules/toolbar/views/panels/template', ['panel' => $this]);
    }

    /**
     * @return array
     */
    public function getViewFiles()
    {
        return $this->_view_files;
    }
}
