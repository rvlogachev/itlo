<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\WidgetText */

$this->title =  'Редактирование сообщения: '  . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Сообщения'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('common', 'Редактирование');
?>
<div class="text-block-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'modelButtons' => $modelButtons,
        'sid' => $sid
    ]) ?>

</div>
