<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedConference $model
 */

$this->title = "Конференция: " . $doctor;
$this->params['breadcrumbs'][] = ['label' => 'Конференция', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="med-conference-view">
	<div class="card">

		<div class="card-header">
		<?php  if(Yii::$app->user->can('doctor')):?>
			<?php if( $model->status == \common\models\MedConference::NEW_STATUS):?>
				<button onclick="connectToPeer()" id="connectBtn" class="btn btn-info">
					Войти в конференцию
				</button>
			<?php endif;?>
	<?php endif;?>

		</div>
		<div class="card-body">
			<div class="messages  "></div>

			<div>
				<video   class="remote-video" autoplay></video>
			</div>
			<input type="hidden" id="connect-to-peer" value="<?= $model->frontend_peer ?>"/>
			<input type="text" id="report" value="<?= $model->report ?>"/>



			<div style="display: none" id="comments">
				<label>Комментарии</label><br>
				<textarea id="comment" rows="10" cols="150" data-id="<?= $model->id; ?>"></textarea>
			</div>
			<br>
			<div style="display: none" id="btns">
				<button onclick="successPeer()" class="btn btn-success">
					Прошел
				</button>

				<button onclick="dangerPeer()" class="btn btn-danger">
					Не прошел
				</button>
			</div>

		</div>
	</div>
</div>


<style type="text/css">

	.remote-video {
		transform: rotate(180deg);
	}

	body {
		font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif;
		background-color: white;
		min-width: 450px;
	}

	h1 {
		font-size: 1.75em;
	}

	h2 {
		text-align: center;
		font-size: 4em;
	}

	td {
		width: 50%;
	}

	input {
		margin-bottom: 5px;
	}

	a:visited {
		color: blue;
	}

	.display {
		width: 100%;
		min-height: 400px;
		padding-bottom: 20px;
	}

	.control {
		width: 100%;
		padding-bottom: 20px;
	}

	.control-button {
		width: 100%;
		min-height: 50px;
	}

	.display-box {
		border: 2px solid black;
	}

	.title {
		vertical-align: top;
	}

	.standby {
		background-color: red;
	}

	.go {
		background-color: green;
	}

	.fade {
		background-color: yellow;
	}

	.off {
		background-color: gray;
	}

	.hidden {
		visibility: hidden;
	}

	.no-display {
		display: none;
	}

	.status {
		height: 125px;
		vertical-align: text-top;
		font-weight: bold;
		margin-bottom: 10px;
		border-bottom: 2px solid black;

	}

	.message {
		height: 125px;
		max-height: 125px;
		margin-bottom: 10px;
		border-bottom: 2px solid black;
		overflow: auto;
	}

	.msg-time {
		color: blue;
	}

	.cueMsg {
		color: orange;
	}

	.selfMsg {
		color: green;
	}

	.peerMsg {
		color: red;
	}
</style>