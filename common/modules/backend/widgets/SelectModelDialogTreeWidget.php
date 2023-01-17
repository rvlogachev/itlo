<?php
namespace common\modules\backend\widgets;
use common\modules\backend\helpers\BackendUrlHelper;
use common\modules\backend\widgets\assets\SelectModelDialogWidgetAsset;
use  common\modules\cms\helpers\Image;
use common\modules\cms\models\CmsContent;
use common\modules\cms\models\CmsContentElement;
use common\modules\cms\models\CmsTree;
use common\modules\backend\widgets\SelectModelDialogWidget;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Application;
use yii\widgets\InputWidget;
use Yii;

/**
 * Class SelectModelDialogContentElementWidget
 * @package skeeks\cms\backend\widgets
 */
class SelectModelDialogTreeWidget extends SelectModelDialogWidget
{
    public $modelClassName = 'common\modules\cms\models\CmsTree';

    public $dialogRoute = ['/cms/admin-tree'];

    public function init()
    {
        if (!$this->initClientDataModelCallback)
        {
            $this->initClientDataModelCallback = function(CmsTree $cmsTree)
            {
                $result = ArrayHelper::merge($cmsTree->toArray(), [
                    'image' => $cmsTree->image ? $cmsTree->image->src : '',
                    'url' => $cmsTree->url,
                    'fullName' => $cmsTree->fullName,
                ]);
                ArrayHelper::remove($result, 'description_full');
                ArrayHelper::remove($result, 'description_short');
                return $result;
            };
        }

        if (!$this->previewValueClientCallback)
        {
            $imageSrc = Image::getCapSrc();
            $this->previewValueClientCallback = new \yii\web\JsExpression(<<<JS
            function(data)
            {
                var imagesrc = '{$imageSrc}';
                if (data.image)
                {
                    imagesrc = data.image;
                }
                
                return '<img src="' + imagesrc + '" style="max-width: 50px; max-height: 50px;" /> <a href="' + data.url + '" target="_blank" data-pjax="0">' + data.fullName + '</a>'
            }
JS
            );
        }


        parent::init();
    }
}