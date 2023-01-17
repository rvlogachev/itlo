<?php
namespace common\modules\cms\grid;

use yii\grid\DataColumn;

/**
 * Class FileSizeData
 * @package skeeks\cms\grid
 */
class FileSizeColumnData extends DataColumn
{
    public $filter = false;

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        $size = $model->{$this->attribute};
        return \Yii::$app->formatter->asShortSize($size);
    }
}