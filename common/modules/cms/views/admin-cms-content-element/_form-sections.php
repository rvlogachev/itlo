<?php
/* @var $this yii\web\View */
/* @var $model \common\modules\cms\models\CmsContentElement */
/* @var $relatedModel \common\modules\cms\relatedProperties\models\RelatedPropertiesModel */
?>
<?= $form->fieldSet(\Yii::t('skeeks/cms', 'Sections')); ?>
<?php if ($contentModel->root_tree_id) : ?>
    <?php $rootTreeModels = \common\modules\cms\models\CmsTree::findAll($contentModel->root_tree_id); ?>
<?php else
    : ?>
    <?php $rootTreeModels = \common\modules\cms\models\CmsTree::findRoots()->joinWith('cmsSiteRelation')->orderBy([\common\modules\cms\models\CmsSite::tableName() . ".priority" => SORT_ASC])->all();
    ?>
<?php endif; ?>

<?php /* if ($contentModel->is_allow_change_tree == \skeeks\cms\components\Cms::BOOL_Y) : */ ?><!--
        <?php /* if ($rootTreeModels) : */ ?>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <?php /*= $form->field($model, 'tree_id')->widget(
                        \skeeks\cms\widgets\formInputs\selectTree\SelectTreeInputWidget::class,
                        [
                            'options' => [
                                'data-form-reload' => 'true'
                            ],
                            'multiple' => false,
                            'treeWidgetOptions' =>
                            [
                                'models' => $rootTreeModels
                            ]
                        ]
                    ); */ ?>
                </div>
            </div>
        <?php /* endif; */ ?>
    --><?php /* endif; */ ?>

<?php if ($rootTreeModels) : ?>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <?= $form->field($model, 'treeIds')->widget(
                \common\modules\cms\widgets\formInputs\selectTree\SelectTreeInputWidget::class,
                [
                    'options' => [
                        //'data-form-reload' => 'true'
                    ],
                    'multiple' => true,
                    'treeWidgetOptions' =>
                        [
                            'models' => $rootTreeModels
                        ]
                ]
            ); ?>
        </div>
    </div>
<?php endif; ?>

<?= $form->fieldSetEnd() ?>
