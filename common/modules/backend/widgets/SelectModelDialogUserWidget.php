<?php
namespace common\modules\backend\widgets;
use common\modules\backend\helpers\BackendUrlHelper;
use common\modules\backend\widgets\assets\SelectModelDialogWidgetAsset;
use common\modules\cms\Exception;
use common\modules\cms\helpers\Image;
use common\modules\cms\models\CmsContentElement;
use common\modules\cms\models\CmsUser;
use common\modules\cms\models\Publication;
use common\modules\cms\modules\admin\Module;
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
 * @property CmsUser $user;
 *
 * Class SelectModelDialogUserWidget
 * @package skeeks\cms\backend\widgets
 */
class SelectModelDialogUserWidget extends SelectModelDialogWidget
{

    public $modelClassName = 'skeeks\cms\models\CmsUser';

    public $dialogRoute = ['/cms/admin-user'];

    public function init()
    {
        if (!$this->initClientDataModelCallback)
        {
            $this->initClientDataModelCallback = function(CmsUser $cmsUser)
            {
                return ArrayHelper::merge($cmsUser->toArray(), [
                    'image' => $cmsUser->image ? $cmsUser->image->src : '',
                    //'url' => $cmsUser->url,
                    'displayName' => $cmsUser->displayName,
                ]);
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
                
                return '<img src="' + imagesrc + '" style="max-width: 50px; max-height: 50px;" /> <a href="#" target="_blank" data-pjax="0">' + data.displayName + '</a>'
            }
JS
            );
        }

        parent::init();
    }
}