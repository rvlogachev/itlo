<?php
namespace common\modules\backend\actions;

/**
 * Trait TBackendModelUpdateAction
 * @package common\modules\backend\actions
 */
trait TBackendModelUpdateAction
{
    /**
     * @var bool
     */
    public $modelValidate = true;

    /**
     * @var string
     */
    public $afterContent = '';

    /**
     * @var string
     */
    public $beforeContent = '';

    /**
     * @var string
     */
    public $afterSaveUrl = '';

    /**
     * @var string
     */
    public $successMessage = '';

    /**
     * @var bool
     */
    public $isSaveFormModels = true;


    /**
     * @var array|callable
     */
    public $fields = [];

    /**
     * @var array
     */
    public $formModels = [];
}