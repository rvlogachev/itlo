

<?php foreach ($users as $user) :?>

    <?php $model = \common\modules\bot\models\UserBot::findOne($user);?>

    Сообщение из экрана № <?= $screen_id;?> отправлено пользователю с ид <?=$model->id;?> и данными <?= ($model->username<>'')?$model->username:$model->first_name.' '.$model->last_name;?>

    <?php echo "<hr>";?>



<?php endforeach;?>
