<?php
/**
 * @var $component \common\modules\cms\base\Component
 */
/* @var $this yii\web\View */
?>

<?= $this->render('_header', [
    'component' => $component
]); ?>


<?php $alert = \yii\bootstrap\Alert::begin([
    'options' => [
        'class' => 'alert-default'
    ],
    'closeButton' => false,
]); ?>
    <p><?= \Yii::t('skeeks/cms', 'To improve performance, configure each component of the site is cached.') ?></p>
    <button type="submit" class="btn btn-danger btn-xs" onclick="sx.ComponentSettings.Cache.clearAll(); return false;">
        <i class="fa fa-times"></i> Сбросить кэш для всех
    </button>
<?php $alert::end(); ?>

<?= $this->render('_footer'); ?>



