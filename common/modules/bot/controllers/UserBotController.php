<?php

namespace common\modules\bot\controllers;

use common\modules\bot\components\Helper;
use common\modules\bot\components\telegram\Entities\InlineKeyboardButton;
use common\modules\bot\components\telegram\Entities\InlineKeyboardMarkup;
use Yii;
use common\modules\bot\models\UserBot;
use common\modules\bot\models\UserBotSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserBotController implements the CRUD actions for UserBot model.
 */
class UserBotController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $layout = '@backend/themes/adminlte/views/layouts/common';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserBot models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserBotSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserBot model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserBot model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserBot();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserBot model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            //Helper::sendBotTelegram($id,'Вам назначена роль Оператор');

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserBot model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Yii::$app->authManager->revokeAll($id);

        Yii::$app->db->createCommand('delete from bot_message where chat_id =:id', ['id'=>$id])->execute();

        Yii::$app->db->createCommand('delete from bot_chat where id =:id', ['id'=>$id])->execute();

        Yii::$app->db->createCommand('delete from bot_inline_query where user_id =:id', ['id'=>$id])->execute();
        Yii::$app->db->createCommand('delete from bot_conversation where user_id =:id', ['id'=>$id])->execute();
        Yii::$app->db->createCommand('delete from bot_chosen_inline_result where user_id =:id', ['id'=>$id])->execute();

        // Yii::$app->db->createCommand('delete from bot_user where id =:id', ['id'=>$id])->execute();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserBot model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserBot the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserBot::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
