<?php
namespace common\modules\cms\modules\queryfilters\filters;

use common\modules\cms\modules\queryfilters\filters\modes\FilterModeEmpty;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeEq;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeEqually;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeGt;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeGte;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeLt;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeLte;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeNe;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeNotEmpty;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeRange;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class NumberFilterField extends FilterField
{
    public $defaultMode = FilterModeEq::ID;

    public $modes = [
        FilterModeEmpty::class,
        FilterModeNotEmpty::class,
        FilterModeEq::class,
        FilterModeNe::class,
        FilterModeGt::class,
        FilterModeLt::class,
        FilterModeGte::class,
        FilterModeLte::class,
        FilterModeRange::class,
    ];
}