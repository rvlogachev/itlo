<?php
namespace common\components;


use common\modules\prpart\models\Links;
use GuzzleHttp\Client;

use Yii;

use yii\helpers\Url;

 

class Html extends \kartik\helpers\Html
{


    public static function a($text, $url = null, $options = [])
    {
        $key = isset($options['key']) ? $options['key'] : 0;
        $model = Links::find()->where(['id' => $key])->one();
        $utm = '';
        if (is_object($model)) {
            $utm = $model->description;
        }


        if(!is_array($url)){
            $url = explode("?", $url);
        }



        if (!isset($url[1]) && !$utm) {

            $url = $url[0];

        } elseif (isset($url[1]) && !$utm) {


            $url = $url[0] . "?" . $url[1];


        } elseif (!isset($url[1]) && $utm) {

            $url = $url[0] . "?" . $utm;
        } elseif (isset($url[1]) && $utm) {
            $url = $url[0] . "?" . $url[1] . "&" . $utm;
        }
        if ($url !== null) {
            $options['href'] = Url::to($url);
        }
        return static::tag('a', $text, $options);
    }

}


?>
