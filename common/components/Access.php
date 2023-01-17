<?php
namespace common\components;

trait Access {


	public function beforeAction($action)
	{

		//print_r($this->id.'/'.$this->action->id);

//		if (!parent::beforeAction($action)) {
//			return false;
//		}
//		if (!\Yii::$app->user->can($this->id.'/'.$this->action->id)) {
//			throw new \yii\web\ForbiddenHttpException('You are not allowed to access this page.');
//		}
		return true;
	}
}
?>