<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\modules\widgets\SelectInput;
use common\modules\widgets\Editor;
use common\modules\widgets\TagsInput;

/* @var $this yii\web\View */
/* @var $model common\modules\newsletters\models\Newsletters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="newsletters-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'subject')->textarea(['rows' => 2]) ?>
    <?= $form->field($model, 'content')->widget(Editor::class, [
        'options' => [],
        'pluginOptions' => []
    ]) ?>

    <?php
        echo '<ul class="list-unstyled">';
        foreach ($module->getMailVars() as $name => $description) {
            if (isset($description) && !is_int($name))
                echo '<li>' . Html::tag('span', $name, ['class' => 'label label-info']) . ' - ' .Yii::t('app/modules/newsletters', $description) . '</li>';
            else
                echo '<li>' . Html::tag('span', $description, ['class' => 'label label-info']) . '</li>';
        }
        echo '</ul><br/>';
    ?>

    <?= $form->field($model, 'layouts')->widget(SelectInput::class, [
        'items' => $model->getLayouts(),
        'options' => [
            'class' => 'form-control'
        ]
    ]); ?>

    <?= $form->field($model, 'views')->widget(SelectInput::class, [
        'items' => $model->getViews(),
        'options' => [
            'class' => 'form-control'
        ]
    ]); ?>

    <?= $form->field($model, 'recipients')->widget(TagsInput::class, [
        'options' => [
            'class' => 'form-control'
        ],
        'pluginOptions' => [
            'autocomplete' => Yii::$app->request->absoluteUrl,
            'format' => 'json',
            'minInput' => 2,
            'maxTags' => 100
        ]
    ])->input('text', ['placeholder' => Yii::t('app/modules/newsletters', 'Type recipients...')]); ?>

    <?= $form->field($model, 'reply_to')->textInput() ?>

    <?= $form->field($model, 'status')->widget(SelectInput::class, [
        'items' => $model->getStatusesList(),
        'options' => [
            'class' => 'form-control'
        ]
    ]); ?>

    <hr/>
    <div class="form-group">
        <?= Html::a(Yii::t('app/modules/newsletters', '&larr; Back to list'), ['list/index'], ['class' => 'btn btn-default pull-left']) ?>&nbsp;
        <?php if ((Yii::$app->authManager && $this->context->module->moduleExist('rbac') && Yii::$app->user->can('updatePosts', [
            'created_by' => $model->created_by,
            'updated_by' => $model->updated_by
        ])) || !$model->id) : ?>
            <?= Html::submitButton(Yii::t('app/modules/newsletters', 'Save'), ['class' => 'btn btn-success pull-right']) ?>
        <?php endif; ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
