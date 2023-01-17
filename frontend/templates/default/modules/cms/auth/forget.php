<?php
/* @var $this yii\web\View */
/* @var $model \common\modules\cms\models\forms\PasswordResetRequestFormEmailOrLogin */

use yii\helpers\Html;
use common\modules\cms\base\widgets\ActiveFormAjaxSubmit as ActiveForm;
use \common\modules\cms\helpers\UrlHelper;

?>

<?= $this->render("_header", ['title' => 'Запрос на восстановление пароля']); ?>
<div class="col-md-6 col-md-offset-3">

    <div class="box-static box-border-top padding-30">
        <div class="box-title margin-bottom-30">
            <h2 class="size-20">Восстановление пароля</h2>
        </div>

        <?php $form = ActiveForm::begin([
            'validationUrl' => UrlHelper::construct('cms/auth/forget')->setSystemParam(\common\modules\cms\helpers\RequestResponse::VALIDATION_AJAX_FORM_SYSTEM_NAME)->toString()
        ]); ?>
            <?= $form->field($model, 'identifier') ?>

            <div class="form-group">
                <?= Html::submitButton("Отправить", ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
        <?= Html::a('Авторизация', UrlHelper::constructCurrent()->setRoute('cms/auth/login')->toString()) ?> |
        <?= Html::a('Регистрация', UrlHelper::constructCurrent()->setRoute('cms/auth/register')->toString()) ?>

    </div>
</div>
<?= $this->render("_footer"); ?>


