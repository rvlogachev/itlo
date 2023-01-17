<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\modules\pages\models\Pages */



if (!empty($model->title))
    $this->title = $model->title;
else
    $this->title = $model->name;


if (!empty($model->description))
    $this->registerMetaTag(['content' => Html::encode($model->description), 'name' => 'description']);


if (!empty($model->keywords))
    $this->registerMetaTag(['content' => Html::encode($model->keywords), 'name' => 'keywords']);


if ($model->url)
    $this->registerLinkTag(['rel' => 'canonical', 'href' => $model->url]);
else
    $this->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]);


if ($model->in_amp && $model->url && class_exists('\common\modules\amp\Module')) {
    if (!($amp = Yii::$app->getModule('admin/amp')))
        $amp = Yii::$app->getModule('amp');

    if ($href = $amp->buildAmpPageUrl($model->url)) {
        $this->registerLinkTag([
            'rel' => "amphtml",
            'href' => $href,
        ]);
    }
}

?>

<?= $model->content; ?>