<?php

namespace Nemundo\Admin\Com\Item;

use Nemundo\Html\Block\ContentDiv;

class AdminItemText extends ContentDiv
{

    public function getContent()
    {

        $this->addCssClass('admin-item-text');
        return parent::getContent();

    }

}