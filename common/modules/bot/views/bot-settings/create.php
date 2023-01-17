<?php

use common\components\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotSettings */

$this->title = Yii::t('common', 'Create {modelClass}', [
    'modelClass' => 'Bot Settings',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Bot Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-settings-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
