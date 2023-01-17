<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 * @author Victor Gonzalez <victor@vgr.cl>
 * @var common\models\TimelineEvent $model
 */

use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Html;
?>

<?php echo FAS::icon('user-plus', ['class' => 'bg-green']) ?>
<div class="timeline-item">
    <span class="time">
        <?php echo FAS::icon('clock').' '.Yii::$app->formatter->asRelativeTime($model->created_at) ?>
    </span>

    <h3 class="timeline-header">
        <?php echo Yii::t('backend', 'New user! {identity} has signed up', [
            'identity' => Html::a($model->data['public_identity'], ['user/view', 'id' => $model->data['user_id']]),
            'created_at' => Yii::$app->formatter->asDatetime($model->data['created_at'])
        ]) ?>
    </h3>



    <h3 class="timeline-header">
        Новое событие в системе: <b><?= isset($model->data['text'])?$model->data['text']:'';?></b>
    </h3>

    <p style="margin: 10px;"> <?= isset($model->data['desc'])?$model->data['desc']:'';?></p>
</div>