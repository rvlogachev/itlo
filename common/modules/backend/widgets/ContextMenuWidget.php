<?php
namespace common\modules\backend\widgets;

use common\modules\backend\BackendAction;
use common\modules\backend\helpers\BackendUrlHelper;
use common\modules\cms\modules\contextmenu\JqueryContextMenuWidget;
use yii\helpers\Json;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class ContextMenuWidget extends JqueryContextMenuWidget
{
    public function run()
    {
        $this->view->registerJs(<<<JS
        
        jQuery.contextMenu.types.backendAction = function(item, opt, root) {
            this.addClass('sx-backend-action-wrapper');
            var aOptions = {
                'href' : '#',
            };
            if (item.onclick) {
                aOptions.onclick = item.onclick;
            }
            jQuery('<span>', aOptions).append(item.name)
                .appendTo(this);
        };
JS
        );

        if ($this->items) {
            foreach ($this->items as $key => $item)
            {
                if (!isset($item['type'])) {
                    $item['type'] = 'backendAction';
                }
                $this->items[$key] = $item;
            }
        }

        return parent::run();
    }
}
