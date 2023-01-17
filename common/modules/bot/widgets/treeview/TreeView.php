<?php
namespace common\modules\bot\widgets\treeview;


use common\modules\bot\models\BotScreens;
use common\modules\chat\models\ChatWidgets;
use execut\yii\jui\Widget;

use yii\base\Exception;
use yii\helpers\Html;
use yii\helpers\VarDumper;

/**
 * Bootstrap Tree View wrapper for yii2
 *
 * @property string $size Widget size mode TreeView::SIZE_SMALL | TreeView::SIZE_MIDDLE | TreeView::SIZE_NORMAL
 * @property string $defaultIcon Default icon for each data item
 * @property array $data Tree data
 *
 * @author eXeCUT
 */
class TreeView extends \common\modules\bot\widgets\treeview\Widget     {

    use WidgetTrait;

    const SIZE_SMALL = 'small';
    const SIZE_MIDDLE = 'middle';
    const SIZE_NORMAL = 'normal';
    const TEMPLATE_ADVANCED = '<div class="tree-view-wrapper">
    <div class="row tree-header">
        <div class="col-sm-6">
            <div class="tree-heading-container">{header}</div>
        </div>
        <div class="col-sm-6">
            {search}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {tree}
        </div>
    </div>
</div>';
    const TEMPLATE_SIMPLE = '{tree}';

    /**
     * @var string Widget size
     */
    public $size = TreeView::SIZE_NORMAL;

    /**
     * @var string Icon class from bootstrap
     */
    public $defaultIcon = 'none';

    /**
     * @var array Items list for widget
     */
    public $data = [];

    /**
     * Main container html options
     *
     * @var array
     */
    public $containerOptions = [];

    /**
     * Searvh widget options
     *
     * @var string
     */
    public $searchOptions = [];


    public $platform;
    /**
     * Widget header
     *
     * @var string
     */
    public $header = 'Select from tree';

    /**
     * Template for render widget
     *
     * @var string
     */
    public $template = self::TEMPLATE_ADVANCED;

    /**
     * Run widget
     */
    public function run() {
//
//
//        $data = [
//            [
//                'text' => 'Parent 1',
//                'nodes' => [
//                    [
//                        'text' => 'Child 1',
//                        'nodes' => [
//                            [ 'text' => 'Grandchild 1' ],
//                            [ 'text' => 'Grandchild 2' ]
//                        ]
//                    ],
//                    [
//                        'text' => 'Child 2',
//                    ]
//                ],
//            ],
//            [
//                'text' => 'Parent 2',
//            ]
//        ];
//
//




        //  VarDumper::dump($this->buildTree( Screens::find()->where(['parent_id' =>NULL])->asArray()->all(),0),10,true);die;







        $data = $this->buildTree( BotScreens::find()->where(['parent_id' =>0])->asArray()->all());


        if (isset($this->platform)) {

            $data = $this->buildTree( 0,$this->platform);
        } else {
            $data = $this->buildTree( 0,$this->platform);
        }

        $this->data=$data;


        if ($this->size !== self::SIZE_NORMAL) {
            $this->options['class'] = $this->size;
        }


        if (strpos($this->template, '{tree}') === false) {
            throw new Exception('{tree} not found in widget template');
        }

        $parts = [
            '{tree}' => Html::tag('div', '', $this->options),
            '{header}' => $this->header,
        ];

        if (strpos($this->template, '{search}') !== false) {
            $parts['{search}'] = $this->renderSearchWidget();
        }

        echo Html::tag('div', strtr($this->template, $parts), $this->containerOptions);





        $this->_initDefaultIcon($this->data);
        $this->clientOptions['data'] = $this->data;


    //    VarDumper::dump($this,10,true);die;

        $this->registerWidget('treeview');
    }

    protected function renderSearchWidget() {
        $options = $this->searchOptions;
        $options['treeViewId'] = $this->id;
        if (empty($options['inputOptions'])) {
            $options['inputOptions'] = [];
        }

        if (empty($options['inputOptions']['placeholder'])) {
            $options['inputOptions']['placeholder'] = 'Search...';
        }

        return TreeFilterInput::widget($options);
    }

    /**
     * @param &array $data
     */
    protected function _initDefaultIcon(&$data)
    {
        if($data){
            foreach ($data as &$row) {
                if (empty($row['icon'])) {
                    $row['icon'] = $this->defaultIcon;
                }

                if (isset($row['nodes'])) {
                    $this->_initDefaultIcon($row['nodes']);
                }
            }
        }

    }

    protected function buildTree($parent_id=0,$platform ='telegram') {

        $data=[];
        if ($platform ) {
            $screens = BotScreens::find()->where(['parent_id' =>$parent_id,'platform'=>$platform])->asArray()->all();

        } else {
            $screens = BotScreens::find()->where(['parent_id' =>$parent_id ])->asArray()->all();

        }

        if(count($screens)>0){
            foreach ($screens as $key=>$screen){
                $data[$key]['id']=$screen['id'];
                $data[$key]['status']=$screen['status'];
                $data[$key]['state']=json_decode($screen['state'],true);

               //  VarDumper::dump( $data[$key]['state'],10,true);

                $count = BotScreens::find()->where(['parent_id' =>$screen['id']])->count();

                if($screen['timeout']){
                    $data[$key]['text']=$screen['title'].
                        " <label class=\"badge pull-right label-danger\"> ".$screen['timeout']."  сек.</label>&nbsp;&nbsp;&nbsp;".
                        " <label class=\"badge pull-right label-info\"> ".$screen['id']."</label>&nbsp;&nbsp;&nbsp;".
                        "<label class=\"badge pull-right  label-success\" title='". $screen['key'] ."' > ". substr($screen['key'],0,30) ."</label>&nbsp;&nbsp;&nbsp;";
                }else{
                    $data[$key]['text']=$screen['title'].
                        " <label class=\"badge pull-right label-info\"> ".$screen['id']."</label>&nbsp;&nbsp;&nbsp;".
                        "<label class=\"badge pull-right  label-success\" title='". $screen['key'] ."' > ". substr($screen['key'],0,30) ."</label>&nbsp;&nbsp;&nbsp;";
                }



                $screens = BotScreens::find()->where(['parent_id' =>$screen['id']])->asArray()->all();
                if(count($screens)>0){

                    $data[$key]['nodes']=$this->buildTree($screen['id'],$platform);
                }

            }
        }else{
            return false;
        }



        return $data;
    }


}