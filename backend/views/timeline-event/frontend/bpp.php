<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 * @author Victor Gonzalez <victor@vgr.cl>
 * @var common\models\TimelineEvent $model
 */

use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Html;
?>

<?php echo FAS::icon('stethoscope', ['class' => 'bg-green']) ?>
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
				<?= isset($model->data['desc'])?$model->data['desc']:'';?> <br>
				<?= isset($model->data['data']['bpp']['dia']) ? "Верхнее давление:" . $model->data['data']['bpp']['dia']." мм.рт.ст.":'';?><br>
				<?= isset($model->data['data']['bpp']['sys']) ? "Нижнее давление:" . $model->data['data']['bpp']['sys']." мм.рт.ст.":'';?><br>
				<?= isset($model->data['data']['bpp']['pulse']) ? "Пульс:" . $model->data['data']['bpp']['pulse']." уд./мин.":'';?>
		</p>

</div>