<?
/* @var $this \yii\web\View */
?>

<?/*= $this->render('@template/include/breadcrumbs', [
    'title' => "Результаты поиска: " . \Yii::$app->cmsSearch->searchQuery
])*/?>

<section style="padding: 40px 0;">
    <div class="container sx-content">
        <div class="row">
            <div class="col-md-12">

                <?php \common\modules\cms\modules\admin\widgets\Pjax::begin(); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="/search" method="get" data-pjax="true">
                                <div class="input-group animated fadeInDown">
                                    <input type="text" name="<?= \Yii::$app->cmsSearch->searchQueryParamName; ?>" class="form-control" placeholder="Поиск" value="<?= \Yii::$app->cmsSearch->searchQuery; ?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button" onclick="$('.search-open form').submit(); return false;">Искать</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                <!--=== Content Part ===-->
                    <div class="row">
                        <div class="col-md-12">

                            <?= \common\modules\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                                'namespace'                     => 'ContentElementsCmsWidget-search-result',
                                'viewFile'                      => '@frontend/templates/default/modules/cms/search/_widget',
                                'enabledCurrentTree'            => \common\modules\cms\components\Cms::BOOL_N,
                                'dataProviderCallback'           => function(\yii\data\ActiveDataProvider $dataProvider)
                                {
                                    \Yii::$app->cmsSearch->buildElementsQuery($dataProvider->query);
                                    \Yii::$app->cmsSearch->logResult($dataProvider);
                                },
                            ])?>

                        </div>
                    </div>

                <?php \skeeks\cms\modules\admin\widgets\Pjax::end(); ?>

            </div>
        </div>
    </div>
</section>
