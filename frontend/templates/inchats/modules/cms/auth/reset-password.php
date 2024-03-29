<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use common\modules\cms\base\widgets\ActiveFormAjaxSubmit as ActiveForm;
use \common\modules\cms\helpers\UrlHelper;

?>


<?= $this->render("_header", ['title' => 'Получение нового пароля']); ?>
<div class="col-md-6 col-md-offset-3">

    <div class="box-static box-border-top padding-30">
        <div class="box-title margin-bottom-30">
            <h2 class="size-20"><?= $message; ?></h2>
        </div>

        <?= Html::a('Запросить восстановление еще раз', UrlHelper::constructCurrent()->setRoute('cms/auth/forget')->toString()) ?> |
        <?= Html::a('Авторизация', UrlHelper::constructCurrent()->setRoute('cms/auth/login')->toString()) ?> |
        <?= Html::a('Регистрация', UrlHelper::constructCurrent()->setRoute('cms/auth/register')->toString()) ?>

    </div>
</div>
<?= $this->render("_footer"); ?>
