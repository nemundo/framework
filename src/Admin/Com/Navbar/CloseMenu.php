<?php

namespace Nemundo\Admin\Com\Navbar;

use Nemundo\Html\Block\Div;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;

class CloseMenu extends Div
{

    public function getContent()
    {

        $this->addCssClass('admin-navbar-close');

        $close = new FontAwesomeIcon($this);
        $close->id = 'admin-navbar-close';
        $close->icon = 'xmark';

        return parent::getContent();

    }

}