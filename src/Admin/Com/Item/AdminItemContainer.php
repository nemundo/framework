<?php

namespace Nemundo\Admin\Com\Item;

use Nemundo\Html\Block\ContentDiv;

class AdminItemContainer extends ContentDiv
{

    /**
     * @var bool
     */
    public $hover=false;


    public function getContent()
    {

        $this->addCssClass('admin-item-container');

        if ($this->hover) {
            $this->addCssClass('admin-hover');
        }

        return parent::getContent();

    }

}