<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>
<?= $this->render('@app/views/modules/cms/content-element/default', [
        'model' => $model,
        'isShowMainImage' => false,
]); ?>