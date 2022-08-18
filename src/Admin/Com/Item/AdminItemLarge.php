<?php

namespace Nemundo\Admin\Com\Item;

use Nemundo\Html\Block\ContentDiv;

class AdminItemLarge extends ContentDiv
{

    public function getContent()
    {

        $this->addCssClass('admin-item-large');
        return parent::getContent();

    }

}