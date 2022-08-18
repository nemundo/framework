<?php

namespace Nemundo\Admin\Com\Item;

use Nemundo\Html\Block\ContentDiv;

class AdminItemTitle extends ContentDiv
{

    public function getContent()
    {

        $this->addCssClass('admin-item-title');
        return parent::getContent();

    }

}