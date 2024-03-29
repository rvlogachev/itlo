<?php

use common\modules\cms\modules\admin\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\AuthItem */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 2])->label(\Yii::t('app', 'Description')) ?>

    <?php /*= $form->field($model, 'ruleName')->widget(
        'yii\jui\AutoComplete',
        [
            'options' => [
                'class' => 'form-control',
            ],
            'clientOptions' => [
                'source' => array_keys(Yii::$app->authManager->getRules()),
            ]
        ])
    */ ?>

    <?= $form->field($model, 'ruleName')->widget(
         \common\modules\cms\modules\chosen\Chosen::className(),
        [
            'items' => \yii\helpers\ArrayHelper::map(
                Yii::$app->authManager->getRules(),
                'name', 'name'
            )
            /*'options' => [
                'class' => 'form-control',
            ],
            'clientOptions' => [
                'source' => array_keys(Yii::$app->authManager->getRules()),
            ]*/
        ])
    ?>

    <?php /*= $form->field($model, 'data')->textarea(['rows' => 6, 'readonly' => 'readonly'])->label(\Yii::t('app','Data')) */ ?>

    <?= $form->buttonsCreateOrUpdate($model); ?>

    <?php ActiveForm::end(); ?>
