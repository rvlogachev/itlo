<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */
$keyStorage = Yii::$app->keyStorage;
$value_company = [$company_id = $keyStorage->get('currentCompanyUser_'.Yii::$app->user->getId())];

?>

<div class="user-form">
    <?php $form =  ActiveForm::begin( ) ?>
        <div class="card">
            <div class="card-body">


	            <?php  if(Yii::$app->user->can('manager HR')):?>
	              <?php echo $form->field($model, 'company_id')->hiddenInput([ 'value'=>json_encode($value_company) ])->label(false) ?>
							<?php else:?>
								<label class="">Компания</label>
	              <?php echo $form->field($model, 'company_id')->widget(\kartik\select2\Select2::classname(), [
		              'data' => $companyUser,
		              'options' => [
			              'placeholder' => 'Select a state ...',
			              'multiple'=>true,
		              'autocomplete'=> "off"
		              ],

		              'pluginOptions' => [

			              'allowClear' => true
		              ],
	              ])->label(false) ?>
							<?php endif; ?>

	            <?php  if(Yii::$app->user->can('manager HR')):?>

	              <?php echo $form->field($model, 'type_id')->hiddenInput([ 'value'=>1 ])->label(false) ?>
              <?php else:?>
								<label>Тип пользователя</label>
	              <?php echo $form->field($model, 'type_id')->dropDownList([ '1'=>'Пользователь','2'=>'Доктор','3'=>'HR менеджер', '4'=>'Администратор'])->label(false) ?>

              <?php endif; ?>


							<label>Имя пользователя (логин)</label>
                <?php echo $form->field($model, 'username')->label(false) ?>
							<label>Email</label>
                <?php echo $form->field($model, 'email')->textInput(['placeholder'=>'company@company.ru'])->label(false) ?>
							<label>Пароль</label>
                <?php echo $form->field($model, 'password')->passwordInput()->label(false) ?>
							<label>Статус</label>
	            <?php echo $form->field($model, 'status')->widget(\kartik\widgets\SwitchInput::class, [
	              'pluginOptions'=>[
		              'handleWidth'=>110,
		              'onText'=>'Активен',
		              'offText'=>'Заблокирован'
	              ]
							])->label(false); ?>



	            <?php  if(Yii::$app->user->can('administrator')):?>
							<label>Роль</label>
                <?php echo $form->field($model, 'roles')->checkboxList($roles)->label(false) ?>
              <?php endif; ?>



            </div>
            <div class="card-footer">
                <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
        </div>
    <?php  ActiveForm::end() ?>
</div>
