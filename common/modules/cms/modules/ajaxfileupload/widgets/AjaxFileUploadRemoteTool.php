<?php
namespace common\modules\cms\modules\ajaxfileupload\widgets;

use common\modules\cms\modules\ajaxfileupload\widgets\assets\AjaxFileUploadRemoteToolAsset;
use common\modules\cms\models\CmsStorageFile;
use yii\helpers\Json;

/**
 * Class AjaxFileUploadRemoteTool
 *
 * @package common\modules\cms\modules\ajaxfileupload\widgets
 */
class AjaxFileUploadRemoteTool extends AjaxFileUploadTool
{
    public $options = [];
    public $clientOptions = [];

    public function init()
    {
        parent::init();

        $this->id = $this->ajaxFileUploadWidget->id."-".$this->id;
        $this->clientOptions['id'] = $this->id;
        $this->clientOptions['upload_url'] = $this->upload_url;
    }

    public function run()
    {
        AjaxFileUploadRemoteToolAsset::register($this->ajaxFileUploadWidget->view);

        $js = Json::encode($this->clientOptions);
        $this->ajaxFileUploadWidget->view->registerJs(<<<JS
(function(sx, $, _)
{
    new sx.classes.fileupload.tools.RemoteUploadTool(sx.{$this->ajaxFileUploadWidget->id}, {$js});
})(sx, sx.$, sx._);
JS
        );
        return '';
    }


}