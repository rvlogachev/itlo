<?php
namespace common\modules\backend;

use common\modules\backend\helpers\BackendUrlHelper;
use common\modules\backend\models\BackendShowing;
use common\modules\cms\helpers\StringHelper;
use common\modules\cms\IHasIcon;
use common\modules\cms\IHasImage;
use common\modules\cms\IHasName;
use common\modules\cms\IHasPermissions;
use common\modules\cms\IHasUrl;
use common\modules\cms\traits\THasIcon;
use common\modules\cms\traits\THasImage;
use common\modules\cms\traits\THasName;
use common\modules\cms\traits\THasPermissions;
use common\modules\cms\traits\THasUrl;
use yii\base\Action;
use yii\base\Event;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use yii\db\Exception;
use yii\helpers\Inflector;

/**
 * @property IHasInfoActions $controller
 * @property string          $backendShowingKey
 * @property []|null $backendShowings
 *
 * Class AdminViewAction
 * @package common\modules\admin\actions
 */
class BackendAction extends Action
    implements IHasName, IHasIcon, IHasImage, IHasUrl, IBackendAction, IHasPermissions
{
    use THasName;
    use THasImage;
    use THasIcon;
    use THasUrl;
    use TBackendAction;
    use THasPermissions;

    const EVENT_INIT = "init";
    public $backendShowingParam = 'sx-backend-showing';
    /**
     * @var bool Показывать отображения?
     */
    public $isDisplayBackendShowings = true;
    public $isOpenNewWindow = false;
    /**
     * @var BackendShowing
     */
    protected $_backendShowing = null;
    protected $_backendShowings = null;

    public function init()
    {
        //Если название не задано, покажем что нибудь.
        if (!$this->name && $this->name !== false) {
            $this->name = Inflector::humanize($this->id);
        }

        if (!$this->controller instanceof IHasInfoActions) {
            throw new InvalidParamException('This action is designed to work with the controller: '.IHasInfoActions::class);
        }

        if ($this->callback && !is_callable($this->callback)) {
            throw new InvalidConfigException('"'.static::class.'::callback Should be a valid callback"');
        }

        if ($this->permissionName === null && $this->accessCallback === null && $this->controller->generateAccessActions === true) {
            if ($this->controller->permissionName) {
                //Если у контроллера задана главная привилегия, то к ней добавляется текущий экшн, и эта строка становится главной привилегией текущего экшена
                $this->permissionName = $this->controller->permissionName . "/" . $this->id;
            } else {
                $this->permissionName = $this->uniqueId;
            }

        }

        if ($this->permissionNames === null && $this->accessCallback === null && $this->permissionName && $this->controller->generateAccessActions === true) {
            $this->permissionNames = [
                $this->permissionName => $this->name,
            ];
        }


        $this->_initUrl()->_initAccess();
        parent::init();

        $this->trigger(self::EVENT_INIT, new Event());
    }
    /**
     * @return $this|mixed
     */
    public function run()
    {
        if ($this->callback) {
            $result = call_user_func($this->callback, $this);
        } else {
            $result = '';
            //$result = parent::run();
        }

        return $result;
    }
    public function getBackendShowing()
    {
        if ($this->_backendShowing === null || !$this->_backendShowing instanceof BackendShowing) {
            //Find in get params
            if ($id = (int)\Yii::$app->request->get($this->backendShowingParam)) {
                if ($backendShowing = BackendShowing::findOne($id)) {
                    $this->_backendShowing = $backendShowing;
                    return $this->_backendShowing;
                } /*else {
                    \Yii::$app->response->redirect($this->indexUrl);
                    \Yii::$app->end();
                }*/
            } elseif ($id = (int)\Yii::$app->request->post($this->backendShowingParam)) {
                if ($backendShowing = BackendShowing::findOne($id)) {
                    $this->_backendShowing = $backendShowing;
                    return $this->_backendShowing;
                }
            }

            //Defauilt filter
            $backendShowing = BackendShowing::find()
                ->where(['key' => $this->backendShowingKey])
                //->andWhere(['cms_user_id' => \Yii::$app->user->id])
                ->andWhere(['is_default' => 1])
                ->one();

            if (!$backendShowing) {
                $backendShowing = new BackendShowing([
                    'key'        => $this->backendShowingKey,
                    //'cms_user_id' => \Yii::$app->user->id,
                    'is_default' => 1,
                ]);
                $backendShowing->loadDefaultValues();

//                if ($backendShowing->save()) {
//
//                } else {
//                    throw new Exception('Backend showing not saved');
//                }
            }

            $this->_backendShowing = $backendShowing;
        }

        return $this->_backendShowing;
    }
    /**
     * @param BackendShowing $backendShowing
     * @return string
     */
    public function getShowingUrl(BackendShowing $backendShowing)
    {
        $url = $this->url;
        $query = [];

        if ($pos = strpos($url, "?")) {
            $url = StringHelper::substr($url, 0, $pos);
            $stringQuery = StringHelper::substr($url, $pos + 1, StringHelper::strlen($url));
            parse_str($stringQuery, $query);
        }


        $url = BackendUrlHelper::createByParams();
        if (is_array($this->urlData)) {
            $url->params = $this->urlData;
            $url->params[$this->backendShowingParam] = $backendShowing->id;
        } else {
            parse_str($this->urlData, $query);
            $url->params = $query;
            $url->params[$this->backendShowingParam] = $backendShowing->id;
        }


        $url->setBackendParamsByCurrentRequest();
        $query[$this->backendShowingParam] = $backendShowing->id;
        //print_r($url->url);die;
        return $url->url;
    }
    /**
     * @return array|BackendShowing[]
     */
    public function getBackendShowings()
    {
        if ($this->_backendShowings === null) {
            $this->_backendShowings = BackendShowing::find()->where([
                'key' => $this->backendShowingKey,
            ])
                ->andWhere([
                    'or',
                    ['cms_user_id' => null],
                    ['cms_user_id' => \Yii::$app->user->id],
                ])
                ->orderBy(['priority' => SORT_ASC])
                ->all();
        }

        return $this->_backendShowings;
    }

    /**
     * @param $backendShowings
     * @return $this
     */
    public function setBackendShowings($backendShowings)
    {
        $this->_backendShowings = $backendShowings;
        return $this;
    }

    protected $_backendShowingKey = null;
    /**
     * @return string
     */
    public function getBackendShowingKey()
    {
        if ($this->_backendShowingKey !== null) {
            return (string)$this->_backendShowingKey;
        }

        return $this->uniqueId;
    }

    /**
     * @param $key
     * @return $this
     */
    public function setBackendShowingKey($key)
    {
        $this->_backendShowingKey = (string)$key;

        return $this;
    }
}