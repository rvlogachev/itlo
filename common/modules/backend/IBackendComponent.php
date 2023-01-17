<?php
namespace common\modules\backend;

/**
 * Interface IBackendComponent
 * @package common\modules\backend
 */
interface IBackendComponent
{
    /**
     * @return BackendMenu
     */
    public function getMenu();

    /**
     * Start the component, load its settings
     * @return $this
     */
    public function run();
    
    /**
     * @return null|IBackendComponent
     */
    static public function getCurrent();
}