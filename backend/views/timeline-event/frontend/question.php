<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 * @author Victor Gonzalez <victor@vgr.cl>
 * @var common\models\TimelineEvent $model
 */

use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Html;
$txt = '';
if( $model->data['data']['question']){

	foreach ($model->data['data']['question'] as $item){
		$txt .= $item ['currentQuestion']. " -- " . $item ['answer']."<br>";
	}

}
?>

<?php echo FAS::icon('wine-glass', ['class' => 'bg-green']) ?>
<div class="timeline-item">
    <span class="time">
        <?php echo FAS::icon('clock').' '.Yii::$app->formatter->asRelativeTime($model->created_at) ?>

    </span>

    <h3 class="timeline-header">
			<a href="/backend/web/report/view?id=<?= $model->report;?>">
	      <?= isset($model->data['text'])?$model->data['text']:'';?>
			</a>
    </h3>
    <p style="margin: 10px;"> <?= isset($model->data['desc'])?$model->data['desc']:'';?> :  <?= $txt;?></p>




</div>