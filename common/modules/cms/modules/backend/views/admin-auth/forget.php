<?php
/* @var $this yii\web\View */
/* @var $model \common\modules\cms\models\forms\LoginFormUsernameOrEmail */

use common\modules\cms\base\widgets\ActiveFormAjaxSubmit as ActiveForm;
use common\modules\cms\helpers\UrlHelper;

?>
<section class="sx-auth-wrapper">
    <div class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-lg-5">
                <div class="u-shadow-v21 sx-bg-auth rounded g-py-40 g-px-30 sx-bg-block">
                    <?php $form = ActiveForm::begin([
                        //'validationUrl' => UrlHelper::construct('cms/auth/forget')->setSystemParam(\skeeks\cms\helpers\RequestResponse::VALIDATION_AJAX_FORM_SYSTEM_NAME)->toString(),
                        'options'       => [
                            'class' => 'reg-page',
                        ],
                    ]); ?>
                    <header class="text-center mb-4">
                        <h2 class="h2 g-font-weight-600">Восстановление пароля</h2>
                    </header>
                    <?= $form->field($model, 'identifier')->textInput([
                        'class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover g-py-15 g-px-15',
                    ]); ?>

                    <div class="mb-4">
                        <button class="btn btn-md btn-block u-btn-primary g-py-13" type="submit">Отправить</button>
                    </div>

                    <div class="text-center g-color-gray-dark-v5 g-font-size-13 mb-0">
                        <?= \yii\helpers\Html::a('Авторизация', UrlHelper::constructCurrent()->setRoute('admin/admin-auth/auth')->toString()) ?>
                    </div>
                    <?php $form::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

