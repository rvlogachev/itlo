<?php

use common\models\MedPositionCompany;
use common\models\User;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\MedPositionCompany $model
 * @var yii\bootstrap4\ActiveForm $form
 */
$keyStorage = Yii::$app->keyStorage;
$company_id = $keyStorage->get('currentCompanyUser_' . Yii::$app->user->getId());

?>

<div class="med-position-company-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">

                <?php echo $form->errorSummary($model); ?>
                <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
								<?php $userCompany = \common\models\UserCompany::find()->where(['user_id'=>Yii::$app->user->getId()])->all();?>
								<?php $ar=[]; foreach ($userCompany as $item){$ar[] = $item->company_id;} ?>
                <?php echo $form->field($model, 'company_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\MedCompany::find()->where(['in', 'id', $ar])->all(), 'id', 'name')) ?>
                <?php echo $form->field($model, 'company_id')->hiddenInput([ 'value'=> $company_id])->label(false) ?>
                <?php echo $form->field($model, 'status')->widget(\kartik\widgets\SwitchInput::class, []); ?>

            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
