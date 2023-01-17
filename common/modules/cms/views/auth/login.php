<?php
/* @var $this yii\web\View */

/* @var $model \common\modules\cms\models\forms\LoginFormUsernameOrEmail */

use yii\helpers\Html;
use common\modules\cms\base\widgets\ActiveFormAjaxSubmit as ActiveForm;
use \common\modules\cms\helpers\UrlHelper;

$this->title = \Yii::t('skeeks/cms', 'Authorization');
\Yii::$app->breadcrumbs->createBase()->append($this->title);
?>
<div class="row">
    <section id="sidebar-main" class="col-md-12">
        <div id="content">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6">

                    <?php $form = ActiveForm::begin([
                        'validationUrl' => UrlHelper::construct('cms/auth/login')->setSystemParam(\common\modules\cms\helpers\RequestResponse::VALIDATION_AJAX_FORM_SYSTEM_NAME)->toString()
                    ]); ?>
                    <?= $form->field($model, 'identifier') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div class="form-group">
                        <?= Html::submitButton("<i class=\"glyphicon glyphicon-off\"></i> " . \Yii::t('skeeks/cms',
                                'Log in'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                    <?= Html::a(\Yii::t('skeeks/cms', 'Forgot your password?'),
                        UrlHelper::constructCurrent()->setRoute('cms/auth/forget')->toString()) ?> |
                    <?= Html::a(\Yii::t('skeeks/cms', 'Registration'),
                        UrlHelper::constructCurrent()->setRoute('cms/auth/register')->toString()) ?>
                </div>

                <div class="col-lg-3">

                </div>
                <!--Или социальные сети
                --><?php /*= yii\authclient\widgets\AuthChoice::widget([
                     'baseAuthUrl' => ['site/auth']
                ]) */ ?>
            </div>
        </div>
    </section>
</div>
