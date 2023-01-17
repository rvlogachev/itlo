<?php
namespace common\modules\terminal;
use yii\web\AssetBundle;

/**
 * TerminalAsset
 *
 * @author Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 */
class TerminalAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/terminal/assets';

    public $css = [
        YII_ENV_DEV ? 'css/terminal.css' : 'css/terminal.min.css',
    ];

    public $depends = [
        'common\modules\terminal\JqueryTerminalAsset',
    ];

    public function init()
    {
        parent::init();
    }
}