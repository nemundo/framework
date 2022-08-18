<?php

namespace Nemundo\Admin\Com\Layout;

use Nemundo\Html\Block\Div;

class AdminMainContent extends Div
{

    public function getContent()
    {

        $this->addCssClass('admin-main-content');
        $this->id = 'main-content';

        return parent::getContent();
    }

}