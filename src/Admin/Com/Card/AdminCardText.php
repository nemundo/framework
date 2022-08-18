<?php

namespace Nemundo\Admin\Com\Card;

use Nemundo\Html\Block\Div;

class AdminCardText extends Div
{

    public function getContent()
    {
        $this->addCssClass('admin-card-content-text');
        return parent::getContent();
    }

}