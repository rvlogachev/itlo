<?php
?>
<li>
    <a href="<?= $model->url; ?>" title="<?= $model->name; ?>"><?= $model->name; ?></a>
    <br />
    <small><?= \Yii::$app->formatter->asDate($model->published_at, 'full'); ?></small>
</li>
