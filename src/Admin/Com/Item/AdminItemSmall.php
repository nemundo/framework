<?php

namespace Nemundo\Admin\Com\Item;

use Nemundo\Html\Block\ContentDiv;

class AdminItemSmall extends ContentDiv
{

    public function getContent()
    {

        $this->addCssClass('admin-item-small');
        return parent::getContent();

    }

}