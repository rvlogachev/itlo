<?php
/**
 * @link https://github.com/AnatolyRugalev
 * @copyright Copyright (c) AnatolyRugalev
 * @license https://tldrlegal.com/license/gnu-general-public-license-v3-(gpl-3)
 */

namespace common\components;

use backend\modules\benbot\models\BotLog;
use backend\modules\benbot\models\WidgetText;
use common\behaviors\AccessLogBehavior;
use common\commands\command\SendCommand;
use common\models\AccessLog;
use backend\models\search\AccessLogSearch;
use common\models\ArticleCategory;
use common\models\ChangeStatusOrder;
use common\models\Clients;
use common\models\Delivery;
use common\models\GeoRegion;
use common\models\IpFilter;
use common\models\Landings;
use common\models\MessagePlan;
use common\models\Order;
use common\models\OrderItem;
use common\models\Product;
use common\models\ProductContragentPrice;
use common\models\RbacAuthItemChild;
use common\models\ShopEvent;
use common\models\Templates;
use common\models\User;
use common\models\Widgets;
use common\modules\blog\models\BlogCatalog;
use common\modules\modulemanager\models\ModulemanagerModules;
use DialogFlow\Method\QueryApi;
use DialogFlow\Model\Query;
use DigitalOceanV2\Exception\HttpException;
use direct\modules\direct\models\Task;
use sammaye\mailchimp\Mailchimp;
use TelegramBot\Api\Client;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use common\components\Cdek;
use common\models\CdekCity;
use VKApi\VkAccessToken;
use VKApi\VkApi;
use VKApi\VkParams;
/**
 * Class Client TODO: Write class description
 * @author Anatoly Rugalev
 * @link https://github.com/AnatolyRugalev
 */
class Helper extends Component
{
    const MOBILE = 'phone';
    const PC = 'computer';
    //TODO Доделать шаблоны html
    const TABLET = 'tablet';

    public static function saveFileUrl($urlFile)
    {
        $pathToSave = \Yii::getAlias('@storage') . "/web/source/1/";
        $local = $pathToSave . md5(microtime()) . ".jpg";
        file_put_contents($local, file_get_contents($urlFile));
        return $local;
    }


    // определение мобильного устройства
    public static function check_mobile_device()
    {
        $mobile_agent_array = array('ipad', 'iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
        $agent = strtolower(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '');

        //print_r($_REQUEST);exit;
        foreach ($mobile_agent_array as $value) {
            if (strpos($agent, $value) !== false) return true;
        }
        return false;
    }

    public static function addEmail($email, $FNAME = '', $LNAME = '', $PHONE = '')
    {
        $mc = new Mailchimp(['apikey' => '87062aa49c1d516907314bef1421379e-us9']);
        $requestData = $mc->lists->subscribe('ac179259c9',
            [
                'email' => $email,

            ], [
                'FNAME' => $FNAME,
                'LNAME' => $LNAME,
                'PHONE' => $PHONE,
            ]
        );
        return $requestData;

    }

    public static function getNameSpaceUser($alias, $id, $theme)
    {

        $namespace = '';
        $modelLandings = Landings::find()->where(['alias' => $alias])->one();

        $namespace = "\common\widgets\LandingWidgets\\{$id}\\themes\u$modelLandings->user_id\\{$theme}\assets\MainAsset";

        return $namespace;
    }

    public static function copy_folder($d1, $d2, $upd = true, $force = true)
    {
        if (is_dir($d1)) {
            $d2 = self::mkdir_safe($d2, $force);
            if (!$d2) {
                self::fs_log("!!fail $d2");
                return;
            }
            $d = dir($d1);
            while (false !== ($entry = $d->read())) {
                if ($entry != '.' && $entry != '..')
                    self::copy_folder("$d1/$entry", "$d2/$entry", $upd, $force);
            }
            $d->close();
        } else {
            $ok = self::copy_safe($d1, $d2, $upd);
            $ok = ($ok) ? "ok-- " : " -- ";
            self::fs_log("{$ok}$d1");
        }
    } //function copy_folder

    static function mkdir_safe($dir, $force)
    {
        if (file_exists($dir)) {
            if (is_dir($dir)) return $dir;
            else if (!$force) return false;
            unlink($dir);
        }
        return (mkdir($dir, 0777, true)) ? $dir : false;
    } //function mkdir_safe

    static function copy_safe($f1, $f2, $upd)
    {
        $time1 = filemtime($f1);
        if (file_exists($f2)) {
            $time2 = filemtime($f2);
            if ($time2 >= $time1 && $upd) return false;
        }
        $ok = copy($f1, $f2);
        if ($ok) touch($f2, $time1);
        return $ok;
    } //function copy_safe

    static function fs_log($str)
    {
        $log = fopen("./fs_log.txt", "a");
        $time = date("Y-m-d H:i:s");
        fwrite($log, "$str ($time)\n");
        fclose($log);
    }

    public static function getAppIdFromName($appName)
    {
        $model = Landings::find()->where(['alias' => $appName])->one();

        if ($model) {

            return $model->id;
        }
        return 0;
    }

    public static function addOrder($landingName, $geo, $accessLogId, $number, $PHONE = '', $FNAME = '', $source_form,$product_id = null, $LNAME = '', $email = '')
    {


        $order = new Order();
        $order->phone = filter_var($PHONE, FILTER_SANITIZE_NUMBER_INT);
        $order->number = $number;
        $order->landing_id = self::getAppIdFromName($landingName);
        $order->address = self::getAddresFromGeo($geo);
        $order->email = $email;
        $order->geo_id = $geo;
        $order->source_form = $source_form;
        $order->status = 3;
        $order->product_id = $product_id;
        $order->access_log_id = $accessLogId;
        $order->fio = ($FNAME || $LNAME) ? $FNAME . " " . $LNAME : "empty";
        $order->user_id = Yii::$app->user->getId()?Yii::$app->user->getId():0;
        if (!$order->save()) {
            throw new \yii\web\HttpException("Ошибка сохранения" . print_r($order->getErrors(), true));
        }


        if ($product_id) self::addOrderItem($order->id, $product_id);

        return $order->id;

    }

    public static function getOrderCountAll()
    {
        $count = Order::find()->count();
        if ($count) {
            return $count;
        }
        return false;
    }

    public static function getOrderCount($st = Order::STATUS_NEW)
    {
        $count = Order::find()->where(['status' => $st])->count();
        if ($count) {
            return $count;
        }
        return false;
    }

    public static function getOrderChartLineTitle()
    {

        $orders = Yii::$app->db->createCommand('select date(now()-  INTERVAL 30 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 29 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 28 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 27 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 26 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 25 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 24 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 23 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 22 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 21 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 20 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 19 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 18 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 17 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 16 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 15 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 14 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 13 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 12 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 11 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 10 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 9 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 8 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 7 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 6 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 5 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 4 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 3 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 2 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 1 DAY)as date from dual')->queryAll();
//        VarDumper::dump($orders,10,true);
//
//        die();
        $out = [];
        foreach ($orders as $order) {
            $out[] = date("d.m.Y", strtotime($order['date']));
        }

//        VarDumper::dump($out,10,true);
//
//        die();

        return $out;

    }

    public static function getOrderChartLineData()
    {

        $orders = Yii::$app->db->createCommand('select *, ifnull(b.cnt,0) count from (
        select date(now()-  INTERVAL 30 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 29 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 28 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 27 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 26 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 25 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 24 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 23 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 22 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 21 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 20 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 19 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 18 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 17 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 16 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 15 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 14 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 13 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 12 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 11 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 10 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 9 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 8 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 7 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 6 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 5 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 4 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 3 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 2 DAY)as datecrt from dual
                        union all
                        select date(now()-  INTERVAL 1 DAY)as datecrt from dual
								union all
                        select date(now())as datecrt from dual ) a 
                        left join (select date(created_at) dtcrt, count(*) cnt 
                        from `order`
                        
                        group by date(created_at)) b on b.dtcrt = a.datecrt
                        order by a.datecrt')->queryAll();


        $out = [];
        foreach ($orders as $order) {
            $out[] = (float)$order['count'];
        }
//        VarDumper::dump($out,10,true);
//
//        die();

        return $out;

    }

    public static function getOrderChartMoneyTitle()
    {

//        $orders = Order::find()->select('date(created_at) as date')->
//        andFilterWhere(['>=','date(created_at)',date("Y-m-d",time()-(30*(60*60*24)))])->
//        groupBy('date(created_at)')->
//        asArray()->
//        all();

        $orders = Yii::$app->db->createCommand('select date(now()-  INTERVAL 30 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 29 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 28 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 27 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 26 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 25 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 24 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 23 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 22 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 21 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 20 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 19 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 18 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 17 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 16 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 15 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 14 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 13 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 12 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 11 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 10 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 9 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 8 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 7 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 6 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 5 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 4 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 3 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 2 DAY)as date from dual
                            union all
                            select date(now()-  INTERVAL 1 DAY)as date from dual')->queryAll();


        $out = [];
        foreach ($orders as $order) {
            $out[] = date("d.m.Y", strtotime($order['date']));
        }


        return $out;

    }

    public static function getOrderChartMoneyData()
    {


        $orders = Yii::$app->db->createCommand(" 
                select   concat(ifnull(sum(b.count),0),\" р.\") count    from (						  
select date(now()-  INTERVAL 30 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 29 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 28 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 27 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 26 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 25 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 24 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 23 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 22 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 21 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 20 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 19 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 18 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 17 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 16 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 15 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 14 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 13 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 12 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 11 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 10 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 9 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 8 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 7 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 6 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 5 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 4 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 3 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 2 DAY)as datecrt from dual
union all
select date(now()-  INTERVAL 1 DAY)as datecrt from dual) a
left join  (
select 	from_unixtime(ch.created_at) created_at,(sum(oi.price) + o.delivery_price)- (sum(pcp.price_drop)+120+o.delivery_price) as count
from `order` o
join order_item oi on oi.order_id = o.id 
join product_contragent_price pcp on pcp.product_id = oi.product_id
left join clients c on c.id = o.client_id
left join client_history ch on ch.order_id = o.id or ch.client_id = c.id
where o.`status` in (10)
 and ch.event_name = 'Реализован'
group by o.id
                

) b on a.datecrt= date(b.created_at)
group by a.datecrt
order by a.datecrt")->queryAll();


        $out = [];
        foreach ($orders as $order) {
            $out[] = (float)$order['count'];
        }


        return $out;

    }

    public static function getOrderChartPieAll()
    {

        $orders = Order::find()->
        select('status, count(*) as count')->
        andFilterWhere(['>=', 'date(created_at)', date("Y-m-d", time() - (30 * (60 * 60 * 24)))])->
        groupBy('status')->
        asArray()->
        all();
//        VarDumper::dump($orders,10,true);
//
//        die();

        $out = [];
        foreach ($orders as $order) {
            $out[] = ['name' => Order::getStatuses((int)$order['status']), 'y' => (float)$order['count']];
        }
//        VarDumper::dump($out,10,true);
//
//        die();


        return $out;

    }

    public static function getOrderChartPieSt()
    {
        $orders = Yii::$app->db->createCommand("/*новые*/                                   
                select bp.name as status,   
                count(*) as count 
                from webmaster.`order` as o
                join statuses s on s.id = o.`status`
                join business_process_step bp on bp.id = s.business_process_step_id
                group by bp.name")->queryAll();
        $out = [];
        foreach ($orders as $order) {
            $out[] = ['name' => $order['status'], 'y' => (int)$order['count']];
        }
        return $out;
    }

    public static function getOrderChartPieSity()
    {

        $orders = Yii::$app->db->createCommand("select r.city,count(*) as count 
from `order` as o 
join geo_region as r on o.geo_id=r.id
where date(o.created_at)>=" . date("Y-m-d", time() - (30 * (60 * 60 * 24))) . "
group by r.city")
            ->queryAll();
//        VarDumper::dump($orders,10,true);
//
//        die();

        $out = [];
        foreach ($orders as $order) {
            $out[] = ['name' => $order['city'], 'y' => (int)$order['count']];
        }
//        VarDumper::dump($out,10,true);
//
//        die();


        return $out;

    }

    public static function getOrderChartPieComp()
    {

        $orders = Yii::$app->db->createCommand(" 
select  log.utm_source as name ,count(*) as count
from `order` as o 
join geo_region as r on o.geo_id=r.id
join access_log as log on o.access_log_id=log.id
group by log.utm_source")
            ->queryAll();
//        VarDumper::dump($orders,10,true);
//
//        die();

        $out = [];
        foreach ($orders as $order) {


            $out[] = [
                'name' => $order['name'],
                'y' => (int)$order['count']
            ];

        }
        VarDumper::dump($out, 10, true);

        die();


        return $out;

    }

    public static function getStatusOrder()
    {

    }

    public static function getOrderChart($st = Order::STATUS_NEW)
    {
        $model = Order::find()->where(['status' => $st])->all();

        $out = [];
        foreach ($model as $ordder) {
            $geo = GeoRegion::find()->where(['id' => $ordder->geo_id])->one();
            $count = Order::find()->andFilterWhere(['like', 'address', $geo->city])->count();
            $out[] = [
                'name' => $geo->city,
                'y' => $count,
                'drilldown' => $geo->city,
            ];
        }

        return $out;
    }

    public static function getAddresFromGeo($geo)
    {
        $geo = GeoRegion::find()->where(['id' => $geo])->one();
        $post = new PostCalc();

        if ($geo) {
            return $post->getIndexFormCity($geo->city) . " " . $geo->okrug . " " . $geo->oblast . " " . $geo->city;
        } else {
            return '';
        }
    }

    public static function getProgresMessage($order)
    {
        $event_count = Task::find()->where(['order_id' => $order])->count();
        if ($event_count) {
            return round(($event_count * 100) / 97, 2);
        }
        return false;
    }

    public static function getCountMessage($order)
    {

        return Task::find()->where(['order_id' => $order])->count();
    }

    public static function getProgresAccess($id)//order id
    {

        $query=[];
        $client_id= Order::findOne($id);
        if($client_id){
            $client_id = $client_id->client_id;
            $cookie = Clients::findOne($client_id);
            $access = AccessLog::find()->where(['cookie'=>$cookie->cookie])->count();
        }

        if ($access) {
            return round(($access * 100) / 97, 2);
        }
        return false;
    }

    public static function getCountAccess($id)
    {
        $query=[];$access=0;
        $client_id= Order::findOne($id);
        if($client_id){
            $client_id = $client_id->client_id;
            $cookie = Clients::findOne($client_id);
            $access = AccessLog::find()->where(['cookie'=>$cookie->cookie])->count();
        }
        return $access;
    }

    public static function addOrderItem($idOrder, $idOffer)
    {

        $offer = Product::findOne($idOffer);

        $orderItem = new OrderItem();
        $orderItem->order_id = $idOrder;
        $orderItem->product_id = $idOffer;
        $orderItem->price = $offer ? $offer->price : 0;

        if (!$orderItem->save()) {

            print_r($orderItem->getErrors());
            die();
        }

        return true;

    }

    public static function addOrderItemNumber($number, $idOffer)
    {


        $product = Product::findOne($idOffer);
        $order = Order::find()->where(['number' => $number])->one();


        $modelContragent = ProductContragentPrice::findAll(['product_id' => $product->id, 'contragent_id' => 1]);


        if ($order) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $idOffer;
            $orderItem->price = $modelContragent[0]->price_sale;

            if (!$orderItem->save()) {

                print_r($orderItem->getErrors());
                die();
            }


            return $orderItem;
        }
        return false;

    }

    public static function addAccessLog($source, $device, $refer, $ip, $brauzer, $param, $dev)
    {
        $model = new AccessLog();
        $model->source = $source;
        $model->device = $device != '' ? substr($device, 0, 240) : '';
        $model->refer = $refer != '' ? substr($refer, 0, 240) : '';
        $model->ip = $ip != '' ? substr($ip, 0, 240) : '';
        $model->brauzer = $brauzer != '' ? substr($brauzer, 0, 240) : '';
        $model->param = $param != '' ? substr($param, 0, 240) : '';
        $model->dev = (int)$dev;

        if (!$model->save()) {
            throw new HttpException("Ошибка сохранения" . print_r($model->getErrors(), true));
        }

        return true;

    }

    public static function GetCity()
    {

        $accessLogId = Yii::$app->session->get('show');
        $model = AccessLog::findOne($accessLogId);
        if ($model) {
            return $model->city;
        }
    }

    public static function tracking($kod)
    {
        $out = '';
        if (!$kod) {
            return 'Не задан номер отправления';
        }

        $wsdlurl = 'https://tracking.russianpost.ru/rtm34?wsdl';
        $client2 = '';

        $client2 = new \SoapClient($wsdlurl, array('trace' => 1, 'soap_version' => SOAP_1_2));

        $params3 = array('OperationHistoryRequest' => array('Barcode' => $kod, 'MessageType' => '0', 'Language' => 'RUS'),
            'AuthorizationHeader' => array('login' => 'SbjFureyarpaQi', 'password' => 'NVQQQoQWzeCR'));


        $result = $client2->getOperationHistory(new \SoapParam($params3, 'OperationHistoryRequest'));


        foreach ($result->OperationHistoryData->historyRecord as $record) {

            $out .= Yii::$app->formatter->asDatetime($record->OperationParameters->OperDate) . " ";

            $out .= $record->AddressParameters->OperationAddress->Description . " ";

            $out .= $record->OperationParameters->OperAttr->Name . "<br>";

        };

        return $out;
    }

    public static function getShowsCount()
    {

        return AccessLogSearch::find()->
        andFilterWhere(['>', 'data', '2016-04-27 00:00:00'])->
        andFilterWhere(['=', 'dev', 0])->
        count();

    }

    public static function getShowsUnicCount()
    {

        return AccessLogSearch::find()->
        andFilterWhere(['>', 'data', date("Y-m-d")])->
        andFilterWhere(['=', 'dev', 0])->
        groupBy('cookie')->
        count();

    }

    public static function setCoockie()
    {


        $landing_user = '';
        if (($cookie = Yii::$app->request->cookies->get('landing_user')) !== null) {
            $landing_user = $cookie->value;
        }
        if (!Yii::$app->getRequest()->getCookies()->has('landing_user')) {
            $landing_user = isset($_GET['alias']) ? $_GET['alias'] . "_" . md5(time()) : Yii::$app->name . "_" . md5(time());
            Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'landing_user',
                'value' => $landing_user,
                'expire' => time() + 86400 * 365
            ]));
        }
        return $landing_user;

    }

    public static function statusServer($name = '')
    {
        $output = shell_exec("ps -auxww | grep '" . $name . "' | grep -v grep");
        $out = explode(" ", $output);

        if (count($out) > 1) {
            return true;
        } else {
            return false;
        }


    }

    public static function getSowsUser($coockie)
    {
        return AccessLogSearch::find()->
        andFilterWhere(['=', 'cookie', $coockie])->
        count();
    }

    public static function formatDateRus($datain)
    {
        $month_arr = array('01' => 'Янв', '02' => 'Фев', '03' => 'Мар', '04' => 'Апр', '05' => 'Май', '06' => 'Июн', '07' => 'Июл', '08' => 'Авг', '09' => 'Сен', '10' => 'Окт', '11' => 'Ноя', '12' => 'Дек');
        $tmp = explode(" ", $datain);
        $data = $tmp[0];
        $time = $tmp[1];
        $data_ar = explode("-", $data);
        foreach ($month_arr as $key => $month) {
            if ($data_ar[1] == $month) {
                return $data_ar[2] . "-" . $key . "-" . $data_ar[0] . " " . $time . ":00";
            }
        }
        return false;

    }

    public static function getUtm()
    {

        if (is_array(AccessUser::getDetect('param')))
            return "?" . http_build_query(AccessUser::getDetect('param'));
        else
            return false;


    }

    public static function actionGetCityFromName($name)
    {

        $model = CdekCity::find()->where(['CityName' => $name])->one();
        if ($model) {
            return $model->City_id;
        } else {
            return false;
        }


    }

    public static function getProductFromLanding($alias)
    {

        $model = Landings::find()->where(['alias' => $alias])->one();
        if ($model) {
            return $model->product_id;
        } else {
            return false;
        }


    }

    public static function sendnotify($number, $event_id, $email = '', $number_otpravki = '')
    {

        $order = Order::find()->where(['number' => $number])->one();
        $model = MessagePlan::find()->where(['status' => MessagePlan::STATUS_ACTIVE, 'event_id' => $event_id,])->all();
        if ($model) {
            foreach ($model as $eventPlan) {
                self::send($eventPlan->type, $eventPlan, $order, $email, $number_otpravki);
            }
        }

    }

    public static function sendnotifyNew($event)//имя события
    {
        $shop_event = ShopEvent::find()->where(['status' => $event->name])->one();


        $email = '';
        $number_otpravki = 0;
        $order = Order::findOne($event->order_id);
        if ($order) {
            $email = $order->email;
            $number_otpravki = $order->number_otpravki;
        }


        $model = MessagePlan::find()->where(
            [
                'status' => MessagePlan::STATUS_ACTIVE,
                'event_id' => $shop_event->id,
            ])->all();

        if ($model) {
            foreach ($model as $eventPlan) {


                self::send($eventPlan->type, $eventPlan, $order, $email, $number_otpravki,$event);
            }
        }

    }
    //Удалим все запланированые сообщения по заказу
    public static function complit($event)
    {
        $model = Task::find()->andWhere(['>', 'data_send', date("Y-m-d", time())])->andWhere(['=', 'order_id', $event->order_id])->all();
        foreach ($model as $order) {
            $order->delete();
        }
        return true;
    }

    public function send($type, $event, $order, $email, $number_otpravki,$sysevent=0)
    {

        $template = Templates::find()->where(['id' => $event->template_id])->one();

        $phone = isset($order->phone) ? $order->phone : getenv('ADMIN_PHONE');


        if ($template) {


            $accesUser=new AccessUser();


            $txt = str_replace('{fio}', isset($order->fio) ? $order->fio : "", $template->templates);

            $txt = str_replace('{referal}', self::getReferal($order), $txt);
            $txt = str_replace('{post_id}', $number_otpravki, $txt);
            $txt = str_replace('{city}', isset($accesUser->getDetect('geo')['city'])?$accesUser->getDetect('geo')['city']:"", $txt);
            $txt = str_replace('{phone}', $phone, $txt);
            $txt = str_replace('{order}', isset($order->number) ? $order->number : "", $txt);
            $txt = str_replace('{amount}', isset($order->total_price) ? $order->total_price : "", $txt);
            $txt = str_replace('{date_delivery}', date("d.m.Y", time() + 4 * 60 * 60 * 24), $txt);

            $accesUser = new AccessUser();


            $txt = str_replace('{device}', $accesUser->getDetect('mobile_detect'), $txt);
            if (!$accesUser->getDetect('alias')) {
                $txt = str_replace('{site}', "infomarketstudio.ru ", $txt);
            } else
                $txt = str_replace('{site}', $accesUser->getDetect('alias') . ".infomarketstudio.ru ", $txt);
            $txt = str_replace('{user_ip}', $accesUser->getDetect('ip_detect'), $txt);
            $txt = str_replace('{browser}', $accesUser->getDetect('browser'), $txt);
            $txt = str_replace('{parametrs}', implode(",", is_array($accesUser->getDetect('param')) ? $accesUser->getDetect('param') : []), $txt);

            $order_date = new \DateTime(isset($order->created_at) ? $order->created_at : date("Y-m-d"));
            $order_date->modify("+" . $event->time . " day");

            $data_send = $order_date->format("Y-m-d");

            if ($template->type_notify = Templates::TYPE_NOTIFY_SYSTEM) {
                $email = ['info@infomarketstudio.ru,rsvil10@mail.ru'];
                $phone = "79250111405";

            }


            $ip = IpFilter::find()->select('ip2')->asArray()->all();
            $ipArr=[];foreach ($ip as $item){$ipArr[]=$item['ip2'];}

            // Исключаем из нотификаций по фильтру2
            if(!in_array($accesUser->getDetect('ip_detect'),$ipArr)){
                \Yii::$app->commandBus->handle(new SendCommand([
                    'type' => (int)$type,
                    'title' => 'Планировщик infomarketstudio.ru',
                    'body' => $txt,
                    'phone' => $phone,
                    'email' => $email,
                    'chenel' => $template->chenel,
                    'order_id' => isset($order->id) ? $order->id : null,
                    'data_send' => $data_send
                ]));
            }


        }
    }

    public static function getSite($order)
    {
        if (empty($order)) return false;
        $site = Landings::find()->where(['id' => $order->landing_id])->one();
        if ($site) {
            return $site->domain;
        } else {
            return false;
        }
    }

    public static function getReferal($order)
    {
        if (empty($order)) return false;
        $ref = AccessLog::find()->where(['id' => $order->access_log_id])->one();
        if ($ref) {
            return explode("?", $ref->refer)[0];
        } else {
            return false;
        }
    }

    public static function getCityOrder($order)
    {
        if (empty($order)) return false;
        $ref = AccessLog::find()->where(['id' => $order->access_log_id])->one();
        if ($ref) {
            return $ref->city;
        } else {
            return false;
        }
    }

    public static function GetPriceDelivery($alias, $dafault = false)
    {

        if ($dafault) {
            $defaultDelivery = Delivery::find()->defaultDelivery()->one();
        } else {
            $defaultDelivery = Delivery::find()->where(['alias' => $alias])->one();
        }


        if ($defaultDelivery) {
            $delivery_cost = AccessUser::getDetect('delivery_cost');


            switch ($alias) {
                case 'pochta_1_klass':
                    $delivery = Delivery::find()->where(['alias' => 'pochta_1_klass'])->one();
                    if ($delivery && $delivery->dafault_price == Delivery::DEFAUTL_API) {
                        return $delivery_cost['data']['calc'][0]['cost'];
                    } else {
                        return $delivery->price;
                    }

                    break;
                case 'pochta':
                    $delivery = Delivery::find()->where(['alias' => 'pochta'])->one();
                    if ($delivery && $delivery->dafault_price == Delivery::DEFAUTL_API) {
                        return $delivery_cost['data']['calc'][1]['cost'];
                    } else {
                        return $delivery->price;
                    }
                    break;
                case 'kurier':
                    $delivery = Delivery::find()->where(['alias' => 'kurier'])->one();
                    if ($delivery && $delivery->dafault_price == Delivery::DEFAUTL_API) {
                        return $delivery_cost['cdek']['result']['priceByCurrency'];
                    } else {
                        return $delivery->price;
                    }

                    break;
            }


        }

    }

    public static function GetPriceDeliveryWeb($alias)
    {
        $defaultDelivery = Delivery::find()->where(['alias' => $alias])->one();
        $delivery_cost = AccessUser::getDetect('delivery_cost');
        if ($defaultDelivery->dafault_price == Delivery::DEFAUTL_API) {
            if ($alias == 'pochta_1_klass') return $delivery_cost['data']['calc'][0]['cost'];
            if ($alias == 'pochta') return $delivery_cost['data']['calc'][1]['cost'];
            if ($alias == 'kurier') return $delivery_cost['cdek']['result']['priceByCurrency'];
        } else {
            return $defaultDelivery->price;
        }


    }

    public static function getHistoryStatus($order)
    {

        $model = ChangeStatusOrder::find()->where(['order_id' => $order->id])->all();
        $out = [];
        foreach ($model as $history) {
            if (isset($history->datatime)) {
                $out[] = Yii::$app->formatter->asDatetime($history->datatime) . " c <br>" .
                    $order->getDisplayStatuses($history->status_old) . " на <br>" .
                    $order->getDisplayStatuses($history->status_new);
            }

        }
        return $out;
    }

    public static function dateGap($date1, $date2)
    {
        $time = new \DateTime($date1);

        $since_time = $time->diff(new \DateTime($date2));

        $A['days'] = $since_time->days;
        $A['hours'] = $since_time->days * 24 + $since_time->h;
        $A['minutes'] = ($since_time->days * 24 * 60) + ($since_time->h * 60) + $since_time->i;

        return $A;
    }

    public static function msgAdm($text)
    {

        $sentSuccess = Yii::$app->commandBus->handle(new SendCommand([
            'type' => '5',
            'body' => $text,
            'title' => '',
            'phone' => '',
            'email' => '',
            'order_id' => '',
            'data_send' => date("Y-m-d")

        ]));
        return $sentSuccess;
    }

    public static function addSpace($min_space = 90, $title)
    {

        $sentSuccess = '*';

        $title_num = strlen(trim($title));
        $shag = $min_space / 2;
        $l = $min_space - $title_num;

        $l = $l / 2;
        $shag = $l;
        $text = '';
        for ($i = 0; $i < $shag; $i++) {
            $text .= '&nbsp;';
        }

        $title = $text . $title . $text;

        return $title;
    }

    public static function getMainClassCssValue($item, $alias, $key,$typeWidget=1, $type = 1) // 2 это селект
    {


        $modelLandings = Landings::find()->where(['alias' => $alias])->one();

        $modelWDT = \common\models\ThemesWidgets::findOne($item->theme_id);

        $path ='';

        if($typeWidget==1){//desktop
            $path="@common/widgets/LandingWidgets/";
        }else{
            $path="@common/widgets/LandingMobileWidgets/";
        }


        $path = Yii::getAlias($path . $item->getwidget()->one()->namespase . "/themes/u" . Yii::$app->user->getId() . "/" . $modelWDT->name . "/source/css/mainStyles.css");


        $value = file_get_contents($path);


        $value = preg_replace('/.\S+ {/', '', $value);
        $value = preg_replace('/}/', '', $value);

        $out = explode("\r\n", $value);

        $out = array_diff($out, array(''));
        $out = array_diff($out, array(' '));
        $result = [];
        foreach ($out as $item) {
            if ($type == 2) {
                $item = str_replace(";", "", $item);
            }
            $tmp = explode(":", $item);
            $result[trim($tmp[0])] = $tmp[1];
        }

        return trim($result[$key]);


    }

    public static function getIdWidget($item) // 2 это селект
    {


        $model = Widgets::find()->where(['namespase' => $item])->one();
        if ($model) {
            return $model->id;
        }


    }

    public static function getNameBlogCategory($cat_id){
        $model = ArticleCategory::find()->where(['id'=>$cat_id])->one();
        if($model){
            return $model->title;
        }


    }

    public static function getSlugBlogCategory($cat_id){
        $model = ArticleCategory::find()->where(['id'=>$cat_id])->one();
        if($model){
            return $model->slug;
        }


    }

    public static function getItemsCategory () {
        $dataProvider = BlogCatalog::get(0, BlogCatalog::find()->all());
        foreach($dataProvider as $item) {
            $class ='';$nofolow = ['rel'=>"nofollow"];
            $options=['class' =>' mega-menu'];
            $linkOptions=[];
            if(isset($pathInfo[1])){
                if($item->surname == $pathInfo[1]) {
                    $options=array_merge($options,['class'=>'active']);
                    $linkOptions=array_merge($linkOptions,$nofolow);
                }
            }
            $cat = BlogCatalog::findOne($item['id']);
            if($cat){
                $items[]=['label' =>$item['str_label'], 'url' => ['/blog/'. $cat->getPath($item['id'])  ],'options'=>$options,'linkOptions'=>$linkOptions];
            }else{
                $items[]=['label' =>$item['str_label'], 'url' => ['/blog'  ],'options'=>$options,'linkOptions'=>$linkOptions];
            }

        }
        return isset($items)?$items:false;
    }

    public static function userCanAction ($action){

        $model = RbacAuthItemChild::find()->where(['child'=>$action]);


        foreach ($model as $item) {
            if (Yii::$app->authManager->getRolesByUser(Yii::$app->user->identity->id) == $item->parent){
                return true;
            }
        }

        return false;
   }

    public static function VkPosting($text,$url=''){
       $token = new VkAccessToken("d02cbe0ca350fdf48d4ec0ff124bceb26c42841dcd9ad98c165599079bc94f67a2410804c06b02da8b857"); //мой


       $text=strip_tags($text);
       $text=str_replace("&nbsp;"," ",$text);
       $text=html_entity_decode($text);

       if (!$token->check()) {
           echo 'Invalid token';
           return false;
       }
       $vk = new VkApi($token); //основной класс для работы с апи

//       $upload = new \VKApi\Media\MessagePhotoUpload($vk, $url, new \VKApi\VkParams()); //параметры в соответствии с документацией
//
//       $result = $upload->save(new VkParams(["owner_id" => "-162102459"])); //возвращается объект photo




       $param = new VkParams(["owner_id" => "-162102459","message"=>$text,"attachment"=>$url]); //создаем объект параметров запроса

       $request = $vk->createRequest("wall.post", $param);
       $request->attempts = 5; //количество попыток повторения в случае ошибки
       $result = $request->execute(); //возвращается объект VkResult
       //второй вариант обработки результата
       if ($result->is_success) {
          return true;
       }
       if ($result->is_error) {
           return false;
       }
   }

    public static function TelegrammPosting($text,$pic){

        $token = '520177648:AAFXTN9m9nhq4siFnipom_QOhTs3ZaljSsw';
        $bot = new Client($token);
        $bot->sendPhoto('@chatbotbusiness', $pic);
        $text=str_replace("&nbsp;"," ",$text);
        $text=html_entity_decode($text);
        if (mb_strlen($text)>=4096){
            $bot->sendMessage('@chatbotbusiness', mb_substr(strip_tags($text),0,3000));
            $count  = strlen($text)-3000;
            if($count>=4096){
                $bot->sendMessage('@chatbotbusiness', mb_substr(strip_tags($text),3000,6000));
                $bot->sendMessage('@chatbotbusiness', mb_substr(strip_tags($text),6000,9000));
            }

        }else{
            $bot->sendMessage('@chatbotbusiness', strip_tags($text));
        }

        return true;
    }

    public static function Telegramm($url){
        


        $url_all = "https://t.me/iv?url=".$url."&rhash=f5cf40f9bc1556";
        $token = '520177648:AAFXTN9m9nhq4siFnipom_QOhTs3ZaljSsw';
        $bot = new Client($token);
        $bot->sendMessage('@chatbotbusiness',$url_all,'MARKDOWN',false);

    }

    public static function get_short_url($url)
    {
        //http://api.bit.ly/shorten?longUrl=http://infobot.infomarketstudio.ru&login=%20o_27nro9ss2c&apiKey=%20R_dc62500e3c664c19aff412d3b772fb26

        $bitly_login = "%20o_27nro9ss2c"; // ваш логин в серсисе
        $bitly_apikey = "%20R_dc62500e3c664c19aff412d3b772fb26"; // ваш ключ api

        // напрос к api
        $api_call = file_get_contents("http://api.bit.ly/shorten?longUrl=".$url.
            "&login=".$bitly_login.
            "&apiKey=".$bitly_apikey
        );

        // т.к. ответ приходит в json конвертируем в массив
        $bitlyinfo=json_decode(utf8_encode($api_call),true);



        VarDumper::dump($bitlyinfo);
        // если ошибок нет возвращаем результат
        if ($bitlyinfo['errorCode'] == 0)
        {
            return $bitlyinfo['results'][urldecode($url)]['shortUrl'];
        }
        else
        {
            return false;
        }
    }

    public static function dialog($text=''){
        try {
            $client = new \DialogFlow\Client('fbac2f73e82f4b3ebb91a339ff57a708');
            $queryApi = new QueryApi($client);

            $meaning = $queryApi->extractMeaning($text, [
                'sessionId' => '1234567890',
                'lang' => 'ru',
            ]);
            $response = new Query($meaning);


            $out = $response->getResult()->getFulfillment()->getSpeech();

           return $out."\r\n";


//                $queryApi = new QueryApi($client);
//                $actionMapping = new CustomActionMapping();
//                $dialog = new Dialog($queryApi, $actionMapping);
//
//                // Start dialog ..
//                $dialog->create('1234567890',$text, 'ru');



        } catch (\Exception $error) {
            echo "Error ".$error->getMessage();
        }
    }

    public static function GetText($key,$title=false){
        $body_text='';
        $model =  WidgetText::findOne(['key' => $key, 'status' => WidgetText::STATUS_ACTIVE]);
        if ($model) {
            $body_text= $model->body;
            $title_text= $model->title;

        }
        if($title){
            return ['title'=>$title_text,'body'=>$body_text];
        }else{
            return $body_text;
        }


        return false;
    }

    public static function request_log($bot_send){


        $model = new BotLog();
        $model->message_id=$bot_send->getMessageId(); // * @property integer $message_id
        $model->from_id=$bot_send->getFrom()->getId(); // * @property integer $from_id
        $model->from_is_bot=1; // * @property integer $from_is_bot
        $model->from_first_name=$bot_send->getFrom()->getFirstName(); // * @property string $from_first_name
        $model->from_username=$bot_send->getFrom()->getUsername(); // * @property string $from_username

        $model->chat_id=$bot_send->getChat()->getId(); // * @property integer $chat_id
        $model->chat_first_name=$bot_send->getChat()->getFirstName(); // * @property string $chat_first_name
        $model->chat_username=$bot_send->getChat()->getUsername(); // * @property string $chat_username
        $model->chat_type=$bot_send->getChat()->getType(); // * @property string $chat_type
        $model->date=date("d.m.Y H:s:i",$bot_send->getDate()); // * @property string $date
        $model->text=$bot_send->getText(); // * @property string $text
        if(!$model->save()){
            \Yii::info(print_r($model->getErrors(),true), 'chat');

        }




    }

    public static function sentUniSend($email=0,$phone=0,$list){
        // Ваш ключ доступа к API (из Личного Кабинета)
        $api_key = "6zcdagpngkmae595fhw3o15xzmm36956d3et17ba";
        // Данные о новом контакте
        // Если скрипт в кодировке UTF-8, то удалите вызов iconv

       // $user_name = urlencode(iconv('cp1251', 'utf-8', "Василий Иванович"));

        $user_lists = $list;
        $user_tag = urlencode("Added using API");
        // Создаём GET-запрос


        if ($email!=0) {
            $txt = "&fields[email]=$email";
        } else {
          //  $txt ="&fields[phone]=$phone";
        }

        $api_url = "https://api.unisender.com/ru/api/subscribe?format=json".
            "&api_key=$api_key&list_ids=$user_lists".
            "&fields[email]=$email".
          //  $txt.
            "&tags=$user_tag";
        // Делаем запрос на API-сервер
        $result = file_get_contents($api_url);
        if ($result) {
            // Раскодируем ответ API-сервера
            $jsonObj = json_decode($result);
            if(null===$jsonObj) {
                // Ошибка в полученном ответе
                echo "Invalid JSON";
            }
            elseif(!empty($jsonObj->error)) {
                // Ошибка добавления пользователя
                echo "An error occured: " . $jsonObj->error . "(code: " . $jsonObj->code . ")";
            } else {
                // Новый пользователь успешно добавлен
               // echo "Added. ID is " . $jsonObj->result->person_id;
            }
        } else {
            // Ошибка соединения с API-сервером
            echo "API access error";
        }

    }

    public static function sendNotifyBot($chat_id = false,$text){
        Request::initializeTelegram(new Bot());


        if($chat_id){
            $data['chat_id'] = $chat_id;
            $data['text'] = $text;
            $data['reply_markup'] = new ReplyKeyboardMarkup(
                [
                    'keyboard' => [['Главное меню']] ,
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false,
                    'selective' => false
                ]
            );
            $result = Request::sendMessage($data);
        }else{

            $model = BotUser::find()->where(['!=','id', 604626950])->asArray()->all();

            foreach ($model as $user){

                $data['chat_id'] = $user['id'];
                $data['text'] = $text;
//                $data['reply_markup'] = new ReplyKeyboardMarkup(
//                    [
//                        'keyboard' => [['Главное меню']] ,
//                        'resize_keyboard' => true,
//                        'one_time_keyboard' => false,
//                        'selective' => false
//                    ]
//                );
                $data['reply_markup'] =  new InlineKeyboardMarkup(
                    [
                        'inline_keyboard' =>[
                            [new InlineKeyboardButton(['text'=>'Кнопка','callback_data'=>'btn'])]
                        ]
                    ]
                );
                $result = Request::sendMessage($data);
                $data=[];
            }


        }
        return ['ok'];

    }

    public static function getModuleItems(){
        $items=[];
        $model = ModulemanagerModules::find()->all();

      foreach ($model as $item){
           $module = Yii::$app->getModule($item->code);

           if(is_object($module)&& method_exists($module,'getMenuItems')){



               $items[]= $module->getMenuItems();
           }

           //
       }


      //  die;

        return $items;

    }





}
