<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\geo\models\GeoTranslationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">
            <a data-toggle="collapse" href="#geoTranslationsSearch">
                <span class="glyphicon glyphicon-search"></span> <?= Yii::t('app/modules/geo', 'Translations search') ?>
            </a>
        </h5>
    </div>
    <div id="geoTranslationsSearch" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="geo-translations-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                    'options' => [
                        'data-pjax' => 1
                    ],
                ]); ?>

                <?= $form->field($model, 'id') ?>

                <?= $form->field($model, 'language') ?>

                <?= $form->field($model, 'source_id') ?>

                <?= $form->field($model, 'source_type') ?>

                <?= $form->field($model, 'translation') ?>

                <?= $form->field($model, 'created_at') ?>

                <?= $form->field($model, 'updated_at') ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app/modules/geo', 'Search'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton(Yii::t('app/modules/geo', 'Reset'), ['class' => 'btn btn-default']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>