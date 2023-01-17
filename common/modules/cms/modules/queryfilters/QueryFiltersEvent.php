<?php
namespace common\modules\cms\modules\queryfilters;

use common\modules\cms\helpers\PaginationConfig;
use common\modules\cms\IHasModel;
use common\modules\cms\modules\config\ConfigBehavior;
use common\modules\cms\modules\config\ConfigTrait;
use common\modules\cms\modules\config\DynamicConfigModel;
use common\modules\cms\modules\form\Field;
use common\modules\cms\modules\form\fields\TextField;
use common\modules\cms\modules\form\fields\WidgetField;
use yii\base\Event;
use yii\base\Model;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use yii\data\DataProviderInterface;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class QueryFiltersEvent extends Event
{

    /**
     * @var Field
     */
    public $field;

    /**
     * @var QueryFiltersWidget
     */
    public $widget;

    /**
     * @var ActiveDataProvider
     */
    public $dataProvider;

    /**
     * @var ActiveQuery
     */
    public $query;
}