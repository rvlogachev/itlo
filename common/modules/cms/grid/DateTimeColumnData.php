<?php
namespace common\modules\cms\grid;

use yii\grid\DataColumn;

/**
 * Class DateTimeColumnData
 * @package skeeks\cms\grid
 */
class DateTimeColumnData extends DataColumn
{
    public $filter = false;

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        $timestamp = $model->{$this->attribute};
        return \Yii::$app->formatter->asDatetime($timestamp) . "<br /><small>" . \Yii::$app->formatter->asRelativeTime($timestamp) . "</small>";
    }
}