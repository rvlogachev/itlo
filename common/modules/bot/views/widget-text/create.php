<?php
/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\WidgetText */

$this->title = Yii::t('common', 'Добавление сообщения', [
    'modelClass' => 'Text Block',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Text Blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-block-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'modelButtons' => $modelButtons,
        'sid' => $sid
    ]) ?>

</div>
