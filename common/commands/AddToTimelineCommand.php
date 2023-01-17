<?php

namespace common\commands;

use common\models\TimelineEvent;
use trntv\bus\interfaces\SelfHandlingCommand;
use Yii;
use yii\base\BaseObject;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class AddToTimelineCommand extends BaseObject implements SelfHandlingCommand
{
    /**
     * @var string
     */
    public $category;
    /**
     * @var string
     */
    public $event;
    /**
     * @var mixed
     */
    public $data;

    public $report;

    /**
     * @param AddToTimelineCommand $command
     * @return bool
     */
    public function handle($command)
    {
        $model = new TimelineEvent();
        $model->application = Yii::$app->id;
        $model->category = $command->category;
        $model->report = $command->report;
        $model->event = $command->event;
        $model->data = json_encode($command->data, JSON_UNESCAPED_UNICODE);
        return $model->save(false);
    }
}
