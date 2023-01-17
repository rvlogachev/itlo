<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Userbot */

$this->title = 'Обновление информации по пользователю: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пользовтели бота', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="userbot-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
