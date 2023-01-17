<?php

namespace common\modules\mails\controllers;

use alexantr\elfinder\ConnectorAction;
use Yii;
use yii\web\Controller;

class InboxController extends Controller
{

    /** @var string */
    //public $layout = '//clear';
    public $layout = '@backend/themes/adminlte/views/layouts/common';

    

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCompose()
    {
        return $this->render('compose');
    }
    public function actionRead()
    {
        return $this->render('read');
    }
}
