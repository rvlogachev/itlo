<?php
/* @var $this yii\web\View */
/* @var $model \common\modules\cms\models\forms\LoginFormUsernameOrEmail */

use common\modules\cms\base\widgets\ActiveFormAjaxSubmit as ActiveForm;

$logoutUrl = \common\modules\cms\helpers\UrlHelper::construct("admin/admin-auth/logout")->enableAdmin()->setCurrentRef();

$this->registerCss(<<<CSS
.auth-clients {
    padding-left: 0px;
}
CSS
);
?>
<section class="sx-auth-wrapper">
    <div class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-lg-5">
                <div class="u-shadow-v21 sx-bg-auth rounded g-py-40 g-px-30 sx-bg-block">
                    <?php $form = ActiveForm::begin([
                        'id'            => 'blocked-form',
                        'validationUrl' => (string)\common\modules\cms\helpers\UrlHelper::constructCurrent()->enableAjaxValidateForm(),
                        'options'       => [
                            'class' => 'reg-page',
                        ],
                    ]); ?>
                    <header class="text-center mb-4">
                        <h2 class="h2 g-font-weight-600">Блокировка</h2>
                    </header>

                    <!--<div class="row">
                        <div class="col-md-2">
                            <img src="<?php /*= \Yii::$app->user->identity->image ? \Yii::$app->user->identity->avatarSrc : \skeeks\cms\helpers\Image::getCapSrc(); */ ?>"
                            style="border-radius: 50%; width: 50px;"
                            />
                        </div>
                        <div class="col-md-10">
                            <?php /*= $form->field($model, 'password')->passwordInput([
                                'placeholder' => 'Пароль',
                                'autocomplete' => 'off',
                                'class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15',
                            ])->label(\Yii::$app->user->identity->displayName) */ ?>

                            <div class="mb-4">
                        <button class="btn btn-md btn-block u-btn-primary g-py-13" type="submit">
                            <i class="fas fa-unlock-alt"></i>
                            Разблокировать</button>
                    </div>
                        </div>
                    </div>-->

                    <div class="text-center">
                        <img src="<?= \Yii::$app->user->identity->image ? \Yii::$app->user->identity->avatarSrc : \common\modules\cms\helpers\Image::getCapSrc(); ?>"
                             style="border-radius: 50%; width: 50px;"
                        />
                    </div>

                    <div class="text-center">
                        <?= $form->field($model, 'password')->passwordInput([
                            'placeholder'  => 'Пароль',
                            'autocomplete' => 'off',
                            'class'        => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15',
                        ])->label(\Yii::$app->user->identity->displayName) ?>
                    </div>
                    <div class="mb-4">
                        <button class="btn btn-md btn-block u-btn-primary g-py-13" type="submit">
                            <i class="fas fa-unlock-alt"></i>
                            Разблокировать
                        </button>
                    </div>

                    <?php /*= Html::submitButton("<i class='glyphicon glyphicon-lock'></i> Разблокировать", ['class' => 'btn btn-primary', 'name' => 'login-button']) */ ?>


                    <?php $form::end(); ?>

                    <div class="text-center">

                    </div>
                    <hr/>
                    <div class="text-center g-color-gray-dark-v5 g-font-size-13 mb-0">

                        <?= \Yii::t('skeeks/cms', 'You have successfully logged in, but not for too long been active in the control panel site.') ?>
                        <?= \Yii::t('skeeks/cms', 'Please confirm that it is you, and enter your password.') ?>
                        <p>

                            <?= \yii\helpers\Html::a('<i class="fas fa-sign-out-alt"></i> Выход', $logoutUrl, [
                                "data-method" => "post",
                                "data-pjax"   => "0",
                                "class"       => "btn btn-danger btn-xs pull-right",
                                "style"       => "text-decoration: none;",
                            ]); ?>
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>



