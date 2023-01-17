<?php

use common\grid\EnumColumn;
use common\models\User;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FAS;

/**
 * @var yii\web\View $this
 * @var backend\models\search\UserSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

if (\Yii::$app->user->can('manager HR')){
	$this->title = Yii::t('backend', 'Сотрудники');
}else{
	$this->title = Yii::t('backend', 'Пользователи');
}


$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-header">
        <?php echo Html::a(FAS::icon('user-plus').' '.Yii::t('backend', 'Добавить пользователя', [
            'modelClass' => 'User',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card-body p-0">
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{pager}",
            'options' => [
                'class' => ['gridview', 'table-responsive'],
            ],
            'tableOptions' => [
                'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
            ],
            'columns' => [
	            [
		            'header' => 'Фото',
		            'format' => 'raw',
		            'filter'=>\yii\helpers\ArrayHelper::map(\common\models\MedCompany::find()->all(),'id','name'),
		            'value' =>function($data){
			            return  "<img width='100' src='".$data->getAvatar()."'";
		            },

	            ],
	            [
		            'attribute' => 'type_id',
		            'filter'=>['Не установлено','1'=>'Пользователь','2'=>'Доктор','3'=>'HR менеджер'],
		            'value' =>function($data){
			            $ar = ['Не установлено','1'=>'Пользователь','2'=>'Доктор','3'=>'HR менеджер'];

			            return isset($ar[$data->getUser()->one()->type_id]) ? $ar[$data->getUser()->one()->type_id] : '';


		            },
		            'options' => ['style' => 'width: 5%'],
	            ],
	            [
		            'header' => 'Логин',
		            'format' => 'raw',

		            'value' =>function($data){
			            return   $data->getUser()->one()->username;
		            },

	            ],
	            [
		            'attribute' => 'number',
		            'format' => 'raw',

		            'value' =>function($data){
			            return   $data->number;
		            },
	              'options' => ['style' => 'width: 5%'],

	            ],


	            [
		            'attribute' => 'lastname',
		            'format' => 'raw',

		            'value' =>function($data){
			            return   $data->getFullname();
		            },

	            ],

	            [
		            'attribute' => 'phone',
		            'format' => 'raw',

		            'value' =>function($data){
			            return   $data->phone;
		            },

	            ],


                [
                    'header' => 'Компания',
                    'filter'=>\yii\helpers\ArrayHelper::map(\common\models\MedCompany::find()->all(),'id','name'),
                    'value' =>function($data){

        											$userCompany = \common\models\UserCompany::find()->where(['user_id'=>$data->user_id])->all();
        											$out = [];
        											foreach ($userCompany as $item){
        												$out[] = \common\models\MedCompany::getCompanyName($item->company_id);
															}


                              return implode(', ', $out);
                    },

                ],




                [
                    'class' => EnumColumn::class,
                    'attribute' => 'status',
                    'enum' => User::statuses(),
                    'filter' => User::statuses()
                ],
//                [
//                    'attribute' => 'updated_at',
//                    'format' => 'datetime',
//                    'filter' => DatePicker::widget([
//                        'model' => $searchModel,
//                        'attribute' => 'created_at',
//                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
//                        'pluginOptions' => [
//                            'format' => 'dd-mm-yyyy',
//                            'showMeridian' => true,
//                            'todayBtn' => true,
//                            'endDate' => '0d',
//                        ]
//                    ]),
//                ],
//                [
//                    'attribute' => 'logged_at',
//                    'format' => 'datetime',
//                    'filter' => DatePicker::widget([
//                        'model' => $searchModel,
//                        'attribute' => 'logged_at',
//                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
//                        'pluginOptions' => [
//                            'format' => 'dd-mm-yyyy',
//                            'showMeridian' => true,
//                            'todayBtn' => true,
//                            'endDate' => '0d',
//                        ]
//                    ]),
//                ],
                // 'updated_at',

                [
                    'class' => \common\widgets\ActionColumn::class,
                    'template' => '{login} {profile} {view} {update} {delete}',
                    'options' => ['style' => 'width: 140px'],
                    'buttons' => [
                        'login' => function ($url) {
                            return Html::a(
                                FAS::icon('sign-in-alt', ['aria' => ['hidden' => true], 'class' => ['fa-fw']]),
                                $url,
                                [
                                    'title' => Yii::t('backend', 'Login'),
                                    'class' => ['btn', 'btn-xs', 'btn-secondary']
                                ]
                            );
                        },
                        'profile' => function ($data) {
                            return Html::a(
                                FAS::icon('user', ['aria' => ['hidden' => true], 'class' => ['fa-fw']]),
                                 $data,
                                [
                                    'title' => Yii::t('backend', 'Profile'),
                                    'class' => ['btn', 'btn-xs', 'btn-secondary']
                                ]
                            );
                        },
                    ],
//                    'visibleButtons' => [
//                        'update' => Yii::$app->user->can('administrator') ,
//                        'view' => Yii::$app->user->can('administrator'),
//                        'delete' => Yii::$app->user->can('administrator')
//                    ]

                ],
            ],
        ]); ?>
    </div>

    <div class="card-footer">
        <?php echo getDataProviderSummary($dataProvider) ?>
    </div>
</div>
