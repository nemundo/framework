<?php

namespace Nemundo\Admin\Com\Item;

use Nemundo\Html\Block\ContentDiv;

class AdminItemSubtitle extends ContentDiv
{

    public function getContent()
    {

        $this->addCssClass('admin-item-subtitle');
        return parent::getContent();

    }

}