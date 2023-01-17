<?php
namespace common\modules\cms\widgets\user;

use common\models\User;
use common\modules\cms\widgets\user\assets\UserOnlineWidgetAsset;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class UserOnlineWidget extends Widget
{
    /**
     * @var User
     */
    public $user = null;

    /**
     * @var null
     */
    public $options = null;

    public function run()
    {
        if (!$this->user) {
            return '';
        }
        $user = $this->user;

        if ($user->isOnline) {
            $options = ArrayHelper::merge($this->options, [
                'title' => \Yii::t('skeeks/cms', 'Online'),
                'data-toggle' => 'tooltip',
            ]);

            $online = \yii\helpers\Html::img(UserOnlineWidgetAsset::getAssetUrl('icons/round_green.gif'), $options);
        } else {
            $options = ArrayHelper::merge($this->options, [
                'title' => \Yii::t('skeeks/cms', 'Offline'),
                'data-toggle' => 'tooltip',
            ]);

            $online = \yii\helpers\Html::img(UserOnlineWidgetAsset::getAssetUrl('icons/round_red.gif'), $options);
        }

        return $online;
    }
}