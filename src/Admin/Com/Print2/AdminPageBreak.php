<?php

namespace Nemundo\Admin\Com\Print2;

use Nemundo\Html\Block\Div;

class AdminPageBreak extends Div
{

    public function getContent()
    {

        $this->addCssClass('page-break');
        return parent::getContent();

    }

}