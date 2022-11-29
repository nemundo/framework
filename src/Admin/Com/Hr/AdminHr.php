<?php

namespace Nemundo\Admin\Com\Hr;

use Nemundo\Html\Block\Hr;

class AdminHr extends Hr
{

    public function getContent()
    {
        $this->addCssClass('admin-hr');
        return parent::getContent();
    }

}