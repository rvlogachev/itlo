<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="//api.bitrix24.com/api/v1/"></script>
<script type="application/javascript">

    BX24.callMethod(
        "crm.lead.add",
        {
            fields:
                {
                    "TITLE": "ИП Титов",
                    "NAME": "Глеб",
                    "SECOND_NAME": "Егорович",
                    "LAST_NAME": "Титов",
                    "STATUS_ID": "NEW",
                    "OPENED": "Y",
                    "ASSIGNED_BY_ID": 1,
                    "CURRENCY_ID": "USD",
                    "OPPORTUNITY": 12500,
                    "PHONE": [ { "VALUE": "555888", "VALUE_TYPE": "WORK" } ]
                },
            params: { "REGISTER_SONET_EVENT": "Y" }
        },
        function(result)
        {
            if(result.error())
                console.error(result.error());
            else
                console.info("Создан лид с ID " + result.data());
        }
    );

</script>
<div class="news-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'created_at:datetime',


            'title',

            'view',
            'page',
            // 'category_id',
            // 'thumbnail_base_url:url',
            // 'thumbnail_path',
            // 'status',
            // 'created_by',
            // 'updated_by',
            // 'published_at',
            //
            // 'updated_at',
            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

</div>
