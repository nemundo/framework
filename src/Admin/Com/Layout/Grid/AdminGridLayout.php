<?php

namespace Nemundo\Admin\Com\Layout\Grid;

use Nemundo\Html\Block\Div;

class AdminGridLayout extends Div
{

    public function getContent()
    {
        $this->addCssClass('admin-grid-layout');
        return parent::getContent();
    }

}