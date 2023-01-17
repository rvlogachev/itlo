<?php
namespace common\modules\cms\modules\queryfilters\filters;

use common\modules\cms\modules\queryfilters\filters\modes\FilterModeEmpty;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeEq;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeLike;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeNe;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeNotEmpty;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeNotLike;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class StringFilterField extends FilterField
{
    public $defaultMode = FilterModeLike::ID;

    public $modes = [
        FilterModeEmpty::class,
        FilterModeNotEmpty::class,
        FilterModeEq::class,
        FilterModeLike::class,
        FilterModeNe::class,
        FilterModeNotLike::class,
    ];
}