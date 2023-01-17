<?php
/**
 * @var $component \common\modules\cms\base\Component
 */
/* @var $this yii\web\View */
$controller = $this->context;
?>

<?= $this->render('_header', [
    'component' => $component
]); ?>


<h2><?= \Yii::t('skeeks/cms', 'User settings') ?>: <?= $user->getDisplayName() ?></h2>
<div class="sx-box g-mb-10">
    <?php $alert = \yii\bootstrap\Alert::begin([
        'options' => [
            'class' => 'alert-default'
        ],
        'closeButton' => false,
    ]); ?>
    <?php if ($settings = \common\modules\cms\models\CmsComponentSettings::findByComponentUser($component, $user)->one()) : ?>
        <button type="submit" class="btn btn-danger btn-xs"
                onclick="sx.ComponentSettings.Remove.removeByUser('<?= $user->id; ?>'); return false;">
            <i class="fa fa-times"></i> <?= \Yii::t('skeeks/cms', 'Reset settings for this user') ?>
        </button>
        <small><?= \Yii::t('skeeks/cms',
                'The settings for this component are stored in the database. This option will erase them from the database, but the component, restore the default values. As they have in the code the developer.') ?></small>
    <?php else
        : ?>
        <small><?= \Yii::t('skeeks/cms', 'These settings not yet saved in the database') ?></small>
    <?php endif;
    ?>
    <?php $alert::end(); ?>
</div>

<?php $form = \common\modules\cms\modules\admin\widgets\form\ActiveFormUseTab::begin([
    'enableAjaxValidation' => false,
    'enableClientValidation' => false,
]); ?>

<?php $this->registerJs(<<<JS

(function(sx, $, _)
{
    sx.classes.DynamicForm = sx.classes.Component.extend({

        _onDomReady: function()
        {
            var self = this;

            $("[" + this.get('formreload') + "=true]").on('change', function()
            {
                self.update();
            });
        },

        update: function()
        {
            var self = this;
            
            _.delay(function()
            {
                var jForm = $("#" + self.get('id'));
                jForm.append($('<input>', {'type': 'hidden', 'name' : self.get('nosubmit'), 'value': 'true'}));
                jForm.submit();
            }, 200);
        }
    });

    sx.DynamicForm = new sx.classes.DynamicForm({
        'id' : '{$form->id}',
        'formreload' : '{$controller->reloadFieldParam}',
        'nosubmit' : '{$controller->reloadFormParam}',
    });
})(sx, sx.$, sx._);


JS
); ?>


<?= $form->errorSummary(\yii\helpers\ArrayHelper::merge(
        [$component], $component->getConfigFormModels()
)); ?>

<?php if ($fields = $component->getConfigFormFields()) : ?>
    <?php echo (new \common\modules\cms\modules\form\Builder([
        'models'     => $component->getConfigFormModels(),
        'model'      => $component,
        'activeForm' => $form,
        'fields'     => $fields,
    ]))->render(); ?>
<?php elseif ($formContent = $component->renderConfigForm($form)) : ?>
    <?= $formContent; ?>
<?php else : ?>
    Нет редактируемых настроек для данного компонента
<?php endif; ?>

<?= $form->buttonsStandart($component); ?>
<?= $form->errorSummary(\yii\helpers\ArrayHelper::merge(
        [$component], $component->getConfigFormModels()
)); ?>

<?php \common\modules\cms\modules\admin\widgets\form\ActiveFormUseTab::end(); ?>


<?= $this->render('_footer'); ?>
