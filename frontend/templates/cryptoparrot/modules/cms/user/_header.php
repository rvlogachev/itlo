<?php
/* @var $this yii\web\View */
/* @var $model \common\models\User */

use yii\helpers\Html;
use common\modules\cms\base\widgets\ActiveFormAjaxSubmit as ActiveForm;
use \common\modules\cms\helpers\UrlHelper;

$this->title = $model->getDisplayName() . ' / ' . $title;
\Yii::$app->breadcrumbs->createBase()->append([
    'name' => $model->displayName,
    'url'  => $model->getPageUrl()
]);
?>

<?= $this->render('@frontend/templates/default/include/breadcrumbs', [
    'model' => $model
])?>

<!--=== Content Part ===-->
<div class="container content profile sx-profile">
    <div class="row">
        <div class="col-md-3 md-margin-bottom-40">
            <?php if ($model->image) : ?>
                <img class="img-responsive profile-img margin-bottom-20" src="<?= \common\modules\cms\helpers\Image::getSrc($model->image->src); ?>" alt="">
            <?php else : ?>
                <img class="img-responsive profile-img margin-bottom-20" src="<?= \common\modules\cms\helpers\Image::getSrc(); ?>" alt="">
            <?php endif; ?>

            <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">

                <li class="list-group-item <?= \Yii::$app->controller->action->id == 'view' ? "active": ""?>">
                    <a href="<?= $model->getPageUrl('view')?>"><i class="glyphicon glyphicon-calendar"></i> Профиль</a>
                </li>

                <?php if (!\Yii::$app->user->isGuest && \Yii::$app->user->identity->id == $model->id) : ?>

                    <li class="list-group-item <?= \Yii::$app->controller->action->id == 'edit' ? "active": ""?>">
                        <a href="<?= $model->getPageUrl('edit')?>"><i class="fa fa-cog"></i> Настройки</a>
                    </li>

                    <li class="list-group-item">
                        <a href="<?= \common\modules\cms\helpers\UrlHelper::construct('cms/auth/logout')->setRef('/'); ?>" data-method="post"><i class="glyphicon glyphicon-off"></i> Выход</a>
                    </li>

                <?php endif; ?>

            </ul>


        </div>


        <div class="col-md-9">
            <div class="profile-body">

                <?/* \skeeks\cms\modules\admin\widgets\Pjax::begin([
                    'linkSelector' => '.sx-profile a',
                    'blockContainer' => '.profile-body'
                ]); */?>


