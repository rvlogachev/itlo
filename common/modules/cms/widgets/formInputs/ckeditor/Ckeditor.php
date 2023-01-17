<?php
namespace common\modules\cms\widgets\formInputs\ckeditor;

use common\modules\cms\helpers\UrlHelper;
use common\modules\cms\modules\ckeditor\CKEditorWidget;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
use Yii;

/**
 * Class Ckeditor
 * @package skeeks\cms\widgets\formInputs\ckeditor
 */
class Ckeditor extends CKEditorWidget
{
    /**
     * @var Модель к которой привязываются файлы
     */
    public $relatedModel;

    public function __construct($config = [])
    {
        if (\Yii::$app->admin->requestIsAdmin) {
            $config = ArrayHelper::merge(\Yii::$app->admin->getCkeditorOptions(), $config);
        }

        parent::__construct($config);
    }

    public function init()
    {
        $additionalData = [];
        if ($this->relatedModel && ($this->relatedModel instanceof ActiveRecord && !$this->relatedModel->isNewRecord)) {
            $additionalData = [
                'className' => $this->relatedModel->className(),
                'pk' => $this->relatedModel->primaryKey,
            ];
        }

        $this->clientOptions['filebrowserImageUploadUrl'] = \common\modules\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-tools/select-file'])
            ->merge($additionalData)
            ->enableEmptyLayout()
            ->url;

        $this->clientOptions['filebrowserImageBrowseUrl'] = \common\modules\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-tools/select-file'])
            ->merge($additionalData)
            ->enableEmptyLayout()
            ->url;

        $this->clientOptions['filebrowserBrowseUrl'] = \common\modules\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-tools/select-file'])
            ->merge($additionalData)
            ->enableEmptyLayout()
            ->url;

        parent::init();
    }
}
