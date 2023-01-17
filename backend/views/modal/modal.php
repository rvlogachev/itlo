<?php
yii\bootstrap4\Modal::begin([
	'headerOptions' => [
		'id' => 'modalHeader'
	],
	'id' => 'modal',
	'size' => 'modal-lg',
	'closeButton' => [
		'id' => 'close-button',
		'class' => 'close',
		'data-dismiss' => 'modal',
	],
	//keeps from closing modal with esc key or by clicking out of the modal.
	// user must click cancel or X to close
	'clientOptions' => [
		'backdrop' => false,
		'keyboard' => true
	]
]);?>
<div id='modalContent'>
	<div style='text-align:center'>
		<?=   \yii\helpers\Html::img('@web/img/radio.gif') ?>
	</div>
</div>

<?php yii\bootstrap4\Modal::end(); ?>