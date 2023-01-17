<?php
/* @var $this yii\web\View */
/* @var $model \skeeks\cms\models\forms\SignupForm */

use yii\helpers\Html;
use common\modules\cms\base\widgets\ActiveFormAjaxSubmit as ActiveForm;
use \common\modules\cms\helpers\UrlHelper;
?>
<?= $this->render("_header", ['title' => 'Регистрация']); ?>
<div class="col-md-6 col-md-offset-3">

    <div class="box-static box-border-top padding-30">
        <div class="box-title margin-bottom-30">
            <h2 class="size-20">Регистрация</h2>
        </div>

        <?php $form = ActiveForm::begin([
            'validationUrl' => UrlHelper::construct('cms/auth/register')->setSystemParam(\common\modules\cms\helpers\RequestResponse::VALIDATION_AJAX_FORM_SYSTEM_NAME)->toString()
        ]); ?>
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton("<i class=\"glyphicon glyphicon-off\"></i> Зарегистрироваться", ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
        <?= Html::a('Авторизация', UrlHelper::constructCurrent()->setRoute('cms/auth/login')->toString()) ?>

    </div>
</div>
<?= $this->render("_footer"); ?>
