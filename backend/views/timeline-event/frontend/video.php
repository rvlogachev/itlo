<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 * @author Victor Gonzalez <victor@vgr.cl>
 * @var common\models\TimelineEvent $model
 */

use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Html;

?>

<?php echo FAS::icon('video', ['class' => (isset($model->data['data']['video']) && $model->data['data']['video'] == 'Не пройден') ? 'bg-red' : 'bg-green']) ?>
<div class="timeline-item">
    <span class="time">
        <?php echo FAS::icon('clock').' '.Yii::$app->formatter->asRelativeTime($model->created_at) ?>
    </span>

    <h3 class="timeline-header">
			<a href="/backend/web/report/view?id=<?= $model->report;?>">
        <?= isset($model->data['text'])?$model->data['text']:'';?>
			</a>
    </h3>
    <p style="margin: 10px;">

				<?= isset($model->data['desc'])?$model->data['desc']:'';?> :
				<?= isset($model->data['data']['video']) ?
						$model->data['data']['video']
							:
								'';?>

		</p>
		<p style="margin: 10px;"><?= isset($model->data['data']['doctor'])?$model->data['data']['doctor']['fio'] . "<br>ЭЦП" . $model->data['data']['doctor']['ecp'] :'';?></p>
	<p style="margin: 10px;"><?= isset($model->data['data']['user']['lastname'])?$model->data['data']['user']['lastname'] ." ". $model->data['data']['user']['firstname'] ." ". $model->data['data']['user']['middlename']:'';?></p>

</div>