<?php

use common\components\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotSettings */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => 'Bot Settings',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Bot Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="bot-settings-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
