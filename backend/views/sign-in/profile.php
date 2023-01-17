<?php

use common\models\UserProfile;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use rmrevin\yii\fontawesome\FAS;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\bootstrap4\ActiveForm */

$this->title = Yii::t('backend', 'Edit profile')
?>

<?php $form = ActiveForm::begin() ?>
<div class="user-profile-form card">
    <div class="card-body">

        <?php echo $form->field($model, 'picture')->widget(\trntv\filekit\widget\Upload::class, [
            'url'=>['avatar-upload']
        ]) ?>

        <?php echo $form->field($model, 'firstname')->textInput(['maxlength' => 255]) ?>

        <?php echo $form->field($model, 'middlename')->textInput(['maxlength' => 255]) ?>

        <?php echo $form->field($model, 'lastname')->textInput(['maxlength' => 255]) ?>

        <?php echo $form->field($model, 'phone') ?>

        <?php echo $form->field($model, 'position') ?>

        <?php echo $form->field($model, 'date_birth')->widget(\yii\jui\DatePicker::className(), [
            'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => [
                    'class' => 'form-control',

            ],
            // ... you can configure more DatePicker properties here
        ]) ?>



        <?php echo $form->field($model, 'growth') ?>

        <?php echo $form->field($model, 'weight') ?>

        <?php echo $form->field($model, 'imt')->textInput(); ?>

        <?php echo $form->field($model, 'work_pressure_min') ?>
  	    <?php echo $form->field($model, 'work_pressure_max') ?>
	    <?php echo $form->field($model, 'down_pressure_min') ?>
	    <?php echo $form->field($model, 'down_pressure_max') ?>


	    <?php echo $form->field($model, 'pulse_min') ?>
	    <?php echo $form->field($model, 'pulse_max') ?>



        <?php echo $form->field($model, 'is_disease')->widget(\kartik\widgets\SwitchInput::class, []); ?>


        <?php echo $form->field($model, 'locale')->dropDownlist(Yii::$app->params['availableLocales']) ?>

        <?php echo $form->field($model, 'gender')->dropDownlist([
            UserProfile::GENDER_FEMALE => Yii::t('backend', 'Female'),
            UserProfile::GENDER_MALE => Yii::t('backend', 'Male')
        ]) ?>


<!--        [['locale', 'growth', 'weight', 'imt', 'work_pressure', 'is_disease'], 'required'],-->
<!--        [['gender', 'phone', 'imt', 'work_pressure', 'is_disease'], 'integer'],-->
<!--        [['date_birth'], 'safe'],-->
<!--        [['growth', 'weight'], 'number'],-->
    </div>
    <div class="card-footer">
        <?php echo Html::submitButton(FAS::icon('save').' '.Yii::t('backend', 'Save Changes'), ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>