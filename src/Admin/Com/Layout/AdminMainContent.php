<?php

namespace Nemundo\Admin\Com\Layout;

use Nemundo\Html\Block\Div;
use Nemundo\Html\Layout\Main;

class AdminMainContent extends Main
{

    public function getContent()
    {

        $this->addCssClass('admin-main-content');
        $this->id = 'main-content';

        return parent::getContent();
    }

}