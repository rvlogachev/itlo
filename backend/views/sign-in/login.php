<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \backend\models\LoginForm */

$this->title = Yii::t('backend', 'Sign In');
$this->params['breadcrumbs'][] = $this->title;
$this->params['body-class'] = 'login-page';
?>
<div class="login-box">

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><?php echo Yii::t('backend', 'Авторизация') ?></p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?php echo $form->errorSummary($model) ?>
            <?php echo $form->field($model, 'username', [
                'inputTemplate' => '<div class="input-group">
                    {input}
                    <div class="input-group-append"><span class="input-group-text"><span class="fas fa-user"></span></span></div>
                </div>',
            ]) ?>
            <?php echo $form->field($model, 'password', [
                'inputTemplate' => '<div class="input-group">
                    {input}
                    <div class="input-group-append"><span class="input-group-text"><span class="fas fa-lock"></span></span></div>
                </div>',
            ])->passwordInput() ?>
            <?php echo $form->field($model, 'rememberMe')->widget(\kartik\widgets\SwitchInput::class, [
	            'pluginOptions'=>[
		            'handleWidth'=>60,
		            'onText'=>'Да',
		            'offText'=>'Нет'
	            ]
						]); ?>

            <?php echo Html::submitButton(Yii::t('backend', 'Войти'). ' <span class="fas fa-arrow-right fa-sm"></span>', [
                'class' => 'btn btn-primary btn-block',
                'name' => 'login-button'
            ]) ?>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>