<?php
/* @var $this yii\web\View */
/* @var $action \common\modules\backend\actions\BackendGridModelAction */
/* @var $backendShowing \common\modules\backend\models\BackendShowing */
$controller = $this->context;
?>
<?php $pjax = \common\modules\cms\widgets\Pjax::begin(); ?>


<?php
//$backendCode = \common\modules\backend\BackendComponent::getCurrent()->controllerPrefix;
//$controllerRoute = \common\modules\backend\BackendComponent::getCurrent()->backendShowingControllerRoute;
//$showingsController = \Yii::$app->createController($controllerRoute)[0];
//$showingsControllerTmp = clone $showingsController;
/**
 * @var \common\modules\backend\BackendAction                      $actionIndex
 * @var \common\modules\backend\BackendAction                      $actionCreate
 * @var \common\modules\backend\controllers\BackendModelController $showingsController
 */
//$actionCreate = \yii\helpers\ArrayHelper::getValue($showingsControllerTmp->actions, 'create');


$backendShowing = new \common\modules\backend\models\BackendShowing();
$backendShowing->loadDefaultValues();
$backendShowing->key = $action->backendShowingKey;


$createModal = \yii\bootstrap\Modal::begin([
    'id'     => 'sx-modal-create',
    'header' => '<b>'.\Yii::t('skeeks/backend', 'Создание отображения').'</b>',
    'footer' => '
        <button class="btn btn-primary" onclick="$(\'#sx-create-showing-form\').submit(); return false;">'.\Yii::t('skeeks/backend', 'Create').'</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">'.\Yii::t('skeeks/backend', 'Close').'</button>
    ',
]);
?>

<?php $form = \common\modules\cms\base\widgets\ActiveFormAjaxSubmit::begin([
    'id'                    => 'sx-create-showing-form',
    'action'                => '',//\yii\helpers\Url::to([$controllerRoute.'/create']),
    'validationUrl'         => '',//\yii\helpers\Url::to([$controllerRoute.'/create', 'sx-validate' => true]),
    'afterValidateCallback' => new \yii\web\JsExpression(<<<JS
        function(jForm, AjaxQuery)
        {
            var Handler = new sx.classes.AjaxHandlerStandartRespose(AjaxQuery);
            var Blocker = new sx.classes.AjaxHandlerBlocker(AjaxQuery, {
                'wrapper' : jForm.closest('.modal-content')
            });

            Handler.bind('success', function()
            {
                _.delay(function()
                {
                    window.location.reload();
                }, 1000);
            });
        }
JS
    ),
]); ?>
<?= $form->field($backendShowing, 'name'); ?>
<?= $form->field($backendShowing, 'isPublic')->checkbox(\Yii::$app->formatter->booleanFormat); ?>
<?= $form->field($backendShowing, 'key')->hiddenInput()->label(false); ?>

<?= \yii\bootstrap\Html::hiddenInput('visibles'); ?>
<?= \yii\bootstrap\Html::hiddenInput('values'); ?>
    <button style="display: none;"></button>
<?php \common\modules\cms\base\widgets\ActiveFormAjaxSubmit::end(); ?>

<?php $createModal::end(); ?>


<?php
$action->backendShowing;
$backendShowings = $action->backendShowings;
?>
<?php if ($backendShowings && $action->backendShowing) : ?>
    <?php
    echo \common\modules\backend\widgets\ContextMenuWidget::widget([
        'button'              => false,
        'items'               => [
            'no' => [
                'callback' => new \yii\web\JsExpression("function(key, options) {
                    $('a', $(this)).trigger('click');
                }"),
                //'onclick' => "$(this).click(); return false;",
                'name'     => 'Открыть',
            ],
        ],
        'rightClickSelectors' => ['.sx-no-active-tab'],
    ]);
    ?>
    <ul class="nav nav-tabs sx-backend-showing-tabs">
        <?php foreach ($backendShowings as $backendShowing) : ?>
            <li class="sx-tab nav-item <?= $backendShowing->id == $action->backendShowing->id ? "active sx-active-tab" : "sx-no-active-tab"; ?>" id="sx-tab-<?= $backendShowing->id; ?>">
                <a href="<?= $action->getShowingUrl($backendShowing); ?>" class="nav-link <?= $backendShowing->id == $action->backendShowing->id ? "active" : ""; ?>">
                    <?= $backendShowing->displayName; ?>
                    <?php if ($backendShowing->id == $action->backendShowing->id) : ?>

                        <?php
                        $showingsController = \Yii::$app->createController($controllerRoute)[0];
                        $showingsController->setModel($backendShowing);

                        if ($showingsController->modelActions) {
                            echo \common\modules\backend\widgets\ContextMenuControllerActionsWidget::widget([
                                'actions'             => (array)$showingsController->modelActions,
                                'isOpenNewWindow'     => true,
                                'rightClickSelectors' => ['#sx-tab-'.$backendShowing->id],
                                'button'              => [
                                    'class' => 'fa fa-cog',
                                    'style' => 'font-size: 11px; cursor: pointer;',
                                    'tag'   => 'i',
                                    'label' => '',
                                ],
                            ]);
                        }


                        ?>
                    <?php endif; ?>
                </a>
            </li>
        <?php endforeach; ?>

        <?php if ($actionCreate) : ?>
            <li class="nav-item">
                <a href="#sx-modal-create" class="sx-btn-filter-create nav-link" data-toggle="modal" data-target="#sx-modal-create">
                    <i class="fa fa-plus"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>

    <div class="<?= ($backendShowings && $action->backendShowing) ? "tab-content" : ""; ?>">
        <?php
        $widgetClassName = $action->gridClassName;
        $widgetFiltersClassName = $action->filtersClassName;
        ?>
        <?php
        $grid = $widgetClassName::begin((array)$action->gridConfig);
        $action->gridObject = $grid;
        ?>
        <?php
        if ($widgetFiltersClassName) {
            $filtersConfig = (array)$action->filtersConfig;
            $filtersConfig['dataProvider'] = $grid->dataProvider;

            $component = $widgetFiltersClassName::begin($filtersConfig);
            $widgetFiltersClassName::end();
        }
        ?>

        <?php
        $widgetClassName::end();
        ?>

        <?php if (\Yii::$app->request->post('__gird-all-ids') == '__gird-all-ids') : ?>
            <?php
                $query = $grid->dataProvider->query;
                ob_get_clean();
                $rr = new \common\modules\cms\helpers\RequestResponse();
                $pks = [];
                foreach ($query->each(100) as $element)
                {
                    $pks[] = $element->id;
                }
                $rr->success = true;
                $rr->message = [
                    'total' => count($pks),
                    'pks' => $pks
                ];
                \Yii::$app->response->data = $rr;
                \Yii::$app->end();
            ?>
        <?php endif; ?>

        <?php if (YII_ENV === 'dev' && isset($grid->dataProvider->query)) : ?>
            <a href="#" onclick="$('.sx-grid-sql').toggle(); return false;" style="text-decoration: none; border-bottom: 1px dashed;">Показать SQL</a>
            <div class="sx-grid-sql" style="display: none; padding: 1px solid; padding: 10px;">
                <code><?= $grid->dataProvider->query->createCommand()->rawSql; ?></code>
            </div>
        <?php endif; ?>

    </div>


<?php $pjax::end(); ?>