<?php

namespace common\modules\media\controllers;

use Yii;
use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\modules\media\models\Categories;
use common\modules\media\models\CategoriesSearch;

/**
 * CatsController implements the CRUD actions for Categories model.
 */
class CatsController extends Controller
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';

    /**
     * {@inheritdoc}
     */
    public $defaultAction = 'index';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'roles' => ['admin'],
                        'allow' => true
                    ],
                ],
            ]
        ];

        // If auth manager not configured use default access control
//        if (!Yii::$app->authManager) {
//            $behaviors['access'] = [
//                'class' => AccessControl::class,
//                'rules' => [
//                    [
//                        'roles' => ['@'],
//                        'allow' => true
//                    ],
//                ]
//            ];
//        } else if ($this->module->moduleExist('admin/rbac')) { // Ok, then we check access according to the rules
//            $behaviors['access'] = [
//                'class' => AccessControl::class,
//                'rules' => [
//                    [
//                        'actions' => ['update', 'create', 'delete'],
//                        'roles' => ['updatePosts'],
//                        'allow' => true
//                    ], [
//                        'roles' => ['viewDashboard'],
//                        'allow' => true
//                    ],
//                ],
//            ];
//        }

        return $behaviors;
    }

    /**
     * Lists of all media categories
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'module' => $this->module
        ]);
    }


    /**
     * Creates a new media Category model.
     * If creation is successful, the browser will be redirected to the list of categories.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories();

        if (Yii::$app->request->isAjax) {
            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate())
                    $success = true;
                else
                    $success = false;

                return $this->asJson(['success' => $success, 'alias' => $model->alias, 'errors' => $model->errors]);
            }
        } else {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                if ($model->save()) {
                    // Log activity
                    $this->module->logActivity(
                        'New media category `' . $model->name . '` with ID `' . $model->id . '` has been successfully added.',
                        $this->uniqueId . ":" . $this->action->id,
                        'success',
                        1
                    );

                    Yii::$app->getSession()->setFlash(
                        'success',
                        Yii::t('app/modules/media', 'Category has been successfully added!')
                    );
                } else {
                    // Log activity
                    $this->module->logActivity(
                        'An error occurred while add the media category: ' . $model->name,
                        $this->uniqueId . ":" . $this->action->id,
                        'danger',
                        1
                    );

                    Yii::$app->getSession()->setFlash(
                        'danger',
                        Yii::t('app/modules/media', 'An error occurred while add the new category.')
                    );
                }

                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'module' => $this->module,
            'model' => $model
        ]);

    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the categories list.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Get current URL before save this category
        $oldCategoryUrl = $model->getCategoryUrl(false);

        if (Yii::$app->request->isAjax) {
            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate())
                    $success = true;
                else
                    $success = false;

                return $this->asJson(['success' => $success, 'alias' => $model->alias, 'errors' => $model->errors]);
            }
        } else {
            if ($model->load(Yii::$app->request->post())) {

                // Get new URL for saved category
                $newCategoryUrl = $model->getCategoryUrl(false);

                if ($model->save()) {

                    // Set 301-redirect from old URL to new
                    if (isset(Yii::$app->redirects) && ($oldCategoryUrl !== $newCategoryUrl)) {
                        // @TODO: remove old redirects
                        Yii::$app->redirects->set('media', $oldCategoryUrl, $newCategoryUrl, 301);
                    }

                    // Log activity
                    $this->module->logActivity(
                        'Media category `' . $model->name . '` with ID `' . $model->id . '` has been successfully updated.',
                        $this->uniqueId . ":" . $this->action->id,
                        'success',
                        1
                    );

                    Yii::$app->getSession()->setFlash(
                        'success',
                        Yii::t(
                            'app/modules/media',
                            'OK! Category `{name}` successfully updated.',
                            [
                                'name' => $model->name
                            ]
                        )
                    );
                } else {
                    // Log activity
                    $this->module->logActivity(
                        'An error occurred while update the media category `' . $model->name . '` with ID `' . $model->id . '`.',
                        $this->uniqueId . ":" . $this->action->id,
                        'danger',
                        1
                    );

                    Yii::$app->getSession()->setFlash(
                        'danger',
                        Yii::t(
                            'app/modules/media',
                            'An error occurred while update a category `{name}`.',
                            [
                                'name' => $model->name
                            ]
                        )
                    );
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'module' => $this->module,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'module' => $this->module,
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing Category.
     * If deletion is successful, the browser will be redirected to the categories list.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        // Category for uncategorized posts has undeleted
        if ($model->id === $model::DEFAULT_CATEGORY_ID)
            return $this->redirect(['index']);

        if ($model->delete()) {
            // Log activity
            $this->module->logActivity(
                'Media сategory `' . $model->name . '` with ID `' . $model->id . '` has been successfully deleted.',
                $this->uniqueId . ":" . $this->action->id,
                'success',
                1
            );

            Yii::$app->getSession()->setFlash(
                'success',
                Yii::t(
                    'app/modules/media',
                    'OK! Category `{name}` successfully deleted.',
                    [
                        'name' => $model->name
                    ]
                )
            );
        } else {
            // Log activity
            $this->module->logActivity(
                'An error occurred while deleting the media category `' . $model->name . '` with ID `' . $model->id . '`.',
                $this->uniqueId . ":" . $this->action->id,
                'danger',
                1
            );

            Yii::$app->getSession()->setFlash(
                'danger',
                Yii::t(
                    'app/modules/media',
                    'An error occurred while deleting a category `{name}`.',
                    [
                        'name' => $model->name
                    ]
                )
            );
        }

        return $this->redirect(['index']);
    }


    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return category model item
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app/modules/media', 'The requested category does not exist.'));
    }
}
