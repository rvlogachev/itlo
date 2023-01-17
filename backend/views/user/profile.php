<?php

use common\models\UserProfile;
use rmrevin\yii\fontawesome\FAS;

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\bootstrap4\ActiveForm */

$this->title = Yii::t('backend', 'Редактирование профиля ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Пользователи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Обновление')];
?>

<?php $form = \kartik\form\ActiveForm::begin() ?>
<div class="user-profile-form card" xmlns="http://www.w3.org/1999/html">
	<div class="card-body">


		<div class="container-fluid">

			<div class="row">
				<div class="col-2">
			<?php echo $form->field($model, 'picture')->widget(\trntv\filekit\widget\Upload::class, [
				'url' => ['avatar-upload']
			]) ?>
				</div>
				<div class="col-10">

					<div class="row">
						<div class="col-2">
									<?php echo $form->field($model, 'number', [
										'addon' => ['prepend' => ['content'=>'<i class="fas fa-user"></i>']]
									])->textInput() ?>
						</div>
						<div class="col-2">

									<?php echo $form->field($model, 'firstname', [
										'addon' => ['prepend' => ['content'=>'<i class="fas fa-user"></i>']]
									])->textInput($model->getParam($id, ['maxlength' => 255])) ?>

						</div>
						<div class="col-2">
								<?php echo $form->field($model, 'middlename', [
									'addon' => ['prepend' => ['content'=>'<i class="fas fa-user"></i>']]
								])->textInput($model->getParam($id, ['maxlength' => 255])) ?>
						</div>
						<div class="col-2">
								<?php echo $form->field($model, 'lastname', [
									'addon' => ['prepend' => ['content'=>'<i class="fas fa-user"></i>']]
								])->textInput($model->getParam($id, ['maxlength' => 255])) ?>
						</div>
						<div class="col-2">
								<?php echo $form->field($model, 'phone', [
									'addon' => ['prepend' => ['content'=>'<i class="fas fa-phone"></i>']]
								])->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
													'mask' => '+9(999) 999-99-99',
												]) ?>
						</div>
						<div class="col-2">
				<?php echo $form->field($model, 'date_birth')->widget(\kartik\widgets\DatePicker::class, [
					'language' => 'ru',

					'options' =>$model->getParam($id, [
						'class' => 'form-control',
						'autocomplete'=> "off"

					]),
					'pluginOptions' => [
						'autoclose'=>true,
						'format' => 'yyyy-mm-dd'
					]

				]) ?>
						</div>
					</div>
					<div class="row">


						<div class="col-2">
									<?php echo $form->field($model, 'growth', [
					  'addon' => ['prepend' => ['content'=>'<i class="fas fa-arrow-alt-circle-up"></i>'], 'append' => ['content'=>'см']]
									]) ?>
						</div>
						<div class="col-2">
								<?php echo $form->field($model, 'weight', [
									'addon' => ['prepend' => ['content'=>'<i class="fas fa-balance-scale-right"></i>'], 'append' => ['content'=>'кг']]
								]) ?>
						</div>
						<div class="col-1">
							<label data-toggle="tooltip" data-placement="top" title="Индекс массы тела">Индекс <span data-toggle="tooltip" data-placement="top" title="Индекс массы тела"><?php echo FAS::icon('question', ['class' => '']) ?></span></label>
							<div class="col">
								<span class="badge badge-pill badge-info"><?= $model->imt; ?></span>

							</div>
						</div>
						<div class="col-2">
							<label data-toggle="tooltip" data-placement="top" title="Заболевания, требующие постоянного наблюдения врача">Заболевание <span data-toggle="tooltip" data-placement="top" title="Заболевания, требующие постоянного наблюдения врача"><?php echo FAS::icon('question', ['class' => '']) ?></span></label>

							<?php echo $form->field($model, 'is_disease')->checkbox()->label(); ?>
						</div>
						<div class="col-3">
							<div class="row">


								<div class="col-10">
									<label>Должность</label>

										<?php echo $form->field($model, 'position')->dropDownList($model->getPositionByRole($id, 'manager HR'), \Yii::$app->user->can('manager HR') && Yii::$app->user->getId() == $id ? ['disabled'=>'disabled'] : [])->label(false); ?>

										<?php if(\Yii::$app->user->can('manager HR') ):?>
																<a href="/backend/web/position-company/index">Справочник</a>
										<?php else:?>
																<a href="/backend/web/position/index">Справочник</a>
										<?php endif;?>



								</div>



								<?php if ( $id != Yii::$app->user->getId()):?>
								<div class="col-1">

									<button type="button" style="margin-top: 30px;" class="btn btn-danger" data-toggle="modal" data-target="#modal_add_position">

					  							<?= FAS::icon('plus-square', ['class' => ['nav-icon']]) ?>
									</button>


								</div>
								<?php endif;?>



							</div>


						</div>
						<div class="col-2">
								<?php echo $form->field($model, 'gender',[
											'addon' => ['prepend' => ['content'=>'<i class="fas fa-restroom"></i>']]
										])->dropDownlist([
									UserProfile::GENDER_FEMALE => Yii::t('backend', 'Жен.'),
									UserProfile::GENDER_MALE => Yii::t('backend', 'Муж.')
								],$model->getParam($id)) ?>
						</div>

					</div>

				</div>
			</div>

			<div class="row">
				<div class="col-4">

							<fieldset  >
								<legend>
									Верхнее артериальное давление
									<span data-toggle="tooltip" data-placement="top" title="Верхнее артериальное давление. Заполняются оба параметра из группы или используются параметры установленные в системе" style="size: 12px;"><?php echo FAS::icon('question', ['class' => '']) ?></span>
								</legend>
								<div class="col">

										<?php echo $form->field($model, 'work_pressure_max',[
												'addon' => ['prepend' => ['content'=>'<i class="  fas fa-stethoscope"></i>'], 'append' => ['content'=>'мм рт. ст.']]
											])->textInput(['placeholder' => $work_pressure_max]) ?>
								</div>
								<div class="col">
										<?php echo $form->field($model, 'work_pressure_min',[
											'addon' => ['prepend' => ['content'=>'<i class="  fas fa-stethoscope"></i>'], 'append' => ['content'=>'мм рт. ст.']]
										])->textInput(['placeholder' => $work_pressure_min]) ?>
								</div>

				</div>
				<div class="col-4">

							<fieldset>
								<legend>
									Нижнее артериальное давление
									<span data-toggle="tooltip" data-placement="top" title="Нижнее артериальное давление. Заполняются оба параметра из группы"><?php echo FAS::icon('question', ['class' => '']) ?></span>
								</legend>
								<div class="col">
									<?php echo $form->field($model, 'down_pressure_max',[
										'addon' => ['prepend' => ['content'=>'<i class="  fas fa-stethoscope"></i>'], 'append' => ['content'=>'мм рт. ст.']]
									])->textInput(['placeholder' => $down_pressure_max]) ?>
								</div>
								<div class="col">
									<?php echo $form->field($model, 'down_pressure_min',[
										'addon' => ['prepend' => ['content'=>'<i class="  fas fa-stethoscope"></i>'], 'append' => ['content'=>'мм рт. ст.']]
									])->textInput(['placeholder' => $down_pressure_min]) ?>
								</div>


						</fieldset>

				</div>
				<div class="col-4">

							<fieldset>
									<legend>
										Пульс
										<span data-toggle="tooltip" data-placement="top" title="Пульс. Заполняются оба параметра из группы"><?php echo FAS::icon('question', ['class' => '']) ?></span>
									</legend>
									<div class="col">
											<?php echo $form->field($model, 'pulse_max',[
						  'addon' => ['prepend' => ['content'=>'<i class="fas fa-user-md"></i>'], 'append' => ['content'=>'ударов в минуту']]
					  ])->textInput(['placeholder' => $pulse_max]) ?>
									</div>
									<div class="col">
											<?php echo $form->field($model, 'pulse_min',[
						  'addon' => ['prepend' => ['content'=>'<i class="fas fa-user-md"></i>'], 'append' => ['content'=>'ударов в минуту']]
					  ])->textInput(['placeholder' => $pulse_min]) ?>
									</div>
							</fieldset>

				</div>


			</div>


		</div>


		<!--        [['locale', 'growth', 'weight', 'imt', 'work_pressure', 'is_disease'], 'required'],-->
		<!--        [['gender', 'phone', 'imt', 'work_pressure', 'is_disease'], 'integer'],-->
		<!--        [['date_birth'], 'safe'],-->
		<!--        [['growth', 'weight'], 'number'],-->
	</div>
	<div class="card-footer">
	  <?php echo Html::submitButton(FAS::icon('save') . ' ' . Yii::t('backend', 'Save'), ['class' => 'btn btn-primary']) ?>
	</div>
</div>
<?php \kartik\form\ActiveForm::end() ?>



<?php
\yii\bootstrap4\Modal::begin([
	'id' => 'modal_add_position',
	'title' => 'Добавление новой должности',
	'toggleButton' => false,
	'closeButton' => []

]); ?>

<div class="modal-body">

	<label>Должность</label><br>
	<input type="text" name="position" class="position_value form-control">

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-primary position_add">Добавить</button>
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
</div>

<?php \yii\bootstrap4\Modal::end();
?>



<?php
\yii\bootstrap4\Modal::begin([
	'id' => 'modal_confirm',
	'title' => 'Заболевания, требующие постоянного наблюдения врача',
	'toggleButton' => false,
	'closeButton' => []

]); ?>

	<div class="modal-body">

		<label>При наличии заболевания, требующего постоянного наблюдения врача, видеоконференция с врачом для данного пациента будет обязательна при каждом медосмотре.</label><br>


	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-primary btn_ok">Да</button>
		<button type="button" class="btn btn-secondary btn_no" data-dismiss="modal">Нет</button>
	</div>

<?php \yii\bootstrap4\Modal::end();
?>