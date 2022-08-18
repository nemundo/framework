<?php

namespace Nemundo\Admin\Com\Image;

use Nemundo\Html\Image\Img;

class AdminImage extends Img
{

    /**
     * @var bool
     */
    public $roundedCorner = false;

    public function getContent()
    {

        $this->addCssClass('admin-image');

        if ($this->roundedCorner) {
            $this->addCssClass('admin-image-rounded');
        }

        return parent::getContent();

    }

}