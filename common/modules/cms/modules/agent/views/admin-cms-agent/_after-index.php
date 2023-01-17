<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>


<?php if (\Yii::$app->cmsAgent->onHitsEnabled) : ?>
    <?php $alert = \yii\bootstrap\Alert::begin([
        'options' => [
            'class' => 'alert-warning',
        ],
    ]) ?>

    <?= \Yii::t('skeeks/agent', 'Attention! You use agents mechanism hits users. If possible, switch them on cron.'); ?>
    <br/>
    <b>* * * * * cd <?= ROOT_DIR; ?> && php yii cmsAgent/execute > /dev/null 2>&1</b>

    <?php $alert::end(); ?>
<?php else: ?>
    <?php $alert = \yii\bootstrap\Alert::begin([
        'options' => [
            'class' => 'alert-success',
        ],
    ]) ?>

    <?= \Yii::t('skeeks/agent',
        'In the project settings specified that you are using a mechanism on the crown agents. If the agents do not work, check the entry in the file cron'); ?>
    <br/>
    <b>* * * * * cd <?= ROOT_DIR; ?> && php yii cmsAgent/execute > /dev/null 2>&1</b>
    <?php $alert::end(); ?>
<?php endif; ?>

