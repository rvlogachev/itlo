<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>

<?php if (\Yii::$app->mobileDetect->isMobile) : ?>
    <?= $this->render('@app/views/headers/header-mobile'); ?>
<?php else : ?>
    <?= $this->render('@app/views/headers/header-' . $this->theme->header); ?>
<?php endif; ?>