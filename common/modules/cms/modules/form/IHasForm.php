<?php
namespace common\modules\cms\modules\form;

interface IHasForm
{
    /**
     * @see Builder
     * @return array
     */
    public function builderFields();

    /**
     * @see Builder
     * @return array
     */
    public function builderModels();

    /**
     * TODO: подумать.
     * @return string
     */
    //public function renderActiveForm();
}