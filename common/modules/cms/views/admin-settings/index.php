<?php
/**
 * @var $loadedComponents
 * @var $component \common\modules\cms\base\Component
 */
/* @var $this yii\web\View */
$r = new ReflectionClass($component);
?>

<?php   \common\modules\cms\modules\admin\widgets\Pjax::begin([
    'id' => 'widget-select-component'
])   ?>
<form id="selector-component" action="" method="get" data-pjax>
    <label><?= \Yii::t('skeeks/cms', 'Component settings') ?></label>

    <?=
    \common\modules\cms\modules\chosen\Chosen::widget([
        'name'          => 'component',
        'items'         => $loadedForSelect,
        'allowDeselect' => false,
        'value'         => $r->getName(),
    ])
    ?>
    <?php if (\Yii::$app->admin->isEmptyLayout()) : ?>
        <input type="hidden"
               name="<?= \common\modules\backend\helpers\BackendUrlHelper::BACKEND_PARAM_NAME; ?>[<?= \common\modules\backend\helpers\BackendUrlHelper::BACKEND_PARAM_NAME_EMPTY_LAYOUT; ?>]"
               value="true"/>
    <?php endif; ?>
</form>
<hr/>

<?php if (method_exists($component, 'getEditUrl')) : ?>
    <iframe data-src="<?= $component->getEditUrl(); ?>" width="100%;" height="200px;" id="sx-test"></iframe>
<?php else : ?>
    <?php
    $url = \common\modules\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-component-settings/index'])
            ->merge([
                'componentClassName' => $component->className(),
                'attributes'         => $component->callAttributes,
            ])
            ->enableEmptyLayout()
            ->url
    ?>
    <iframe data-src="<?= $url; ?>" width="100%;" height="200px;" id="sx-test"></iframe>
<?php endif; ?>


<?php
\common\modules\cms\modules\themeunifyv2\admin\assets\UnifyAdminIframeAsset::register($this);
$this->registerJs(<<<JS
(function(sx, $, _)
{
    sx.classes.SelectorComponent = sx.classes.Component.extend({

        _init: function()
        {
            this.Iframe = new sx.classes.Iframe('sx-test', {
                'autoHeight'        : true,
                'heightSelector'    : 'body',
                'minHeight'         : 800
            });
        },

        _onDomReady: function()
        {
            $("#selector-component select").on('change', function()
            {
                $("#selector-component").submit();
            });

            _.delay(function()
            {
                $('#sx-test').attr('src', $('#sx-test').data('src'));
            }, 200);
        },

        _onWindowReady: function()
        {}
    });

    new sx.classes.SelectorComponent();
})(sx, sx.$, sx._);
JS
)
?>

<?php   \common\modules\cms\modules\admin\widgets\Pjax::end();   ?>
