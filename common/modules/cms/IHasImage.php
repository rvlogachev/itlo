<?php
namespace common\modules\cms;

interface IHasImage
{
    /**
     * @return string
     */
    public function getImage();

    /**
     * @param string $image
     * @return mixed
     */
    public function setImage($image);
}