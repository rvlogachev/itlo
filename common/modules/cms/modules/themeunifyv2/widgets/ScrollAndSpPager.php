<?php
namespace common\modules\cms\modules\themeunifyv2\widgets;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class ScrollAndSpPager extends \common\modules\cms\modules\ajaxpager\ScrollAndSpPager
{
    public $triggerTemplate = '<div class="ias-trigger col-md-12">
        <button class="btn u-btn-outline-primary btn-xl btn-block g-mr-10 g-mb-15 ">{text}</button>
    </div>';

    public $triggerText = 'Показать еще';
    public $noneLeftText = '';

    public $spClientOptions = [
        'prevText' => '',
        'nextText' => '',
        'edges'    => '2',
    ];
    
    public $spClientMobileOptions = [
        'prevText'       => '',
        'nextText'       => '',
        'displayedPages' => '2',
    ];

    public function init()
    {
        if (!$this->eventOnPageChange) {
            $id = $this->id;
            $this->eventOnPageChange = new \yii\web\JsExpression(<<<JS
function(pageNum, scrollOffset, url) {
    var getCurrentPage = jQuery('#{$id}').pagination('getCurrentPage');
    var result = getCurrentPage + 1;
    jQuery('#{$id}').pagination('drawPage', result);
}
JS
        );
        }
        parent::init();

    }
}