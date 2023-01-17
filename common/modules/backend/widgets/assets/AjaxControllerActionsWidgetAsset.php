<?php
namespace common\modules\backend\widgets\assets;
use common\modules\cms\base\AssetBundle;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AjaxControllerActionsWidgetAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/backend/widgets/assets/src';
    
    public $css = [
        'css/ajax-controller-actions-widget.css',
    ];
    
    public $js = [
        'js/ajax-controller-actions-widget.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'common\modules\cms\modules\sx\assets\Custom',
    ];
}