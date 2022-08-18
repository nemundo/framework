<?php

namespace Nemundo\Admin\Com\Navbar;

use Nemundo\Admin\Com\Icon\AdminIcon;
use Nemundo\Html\Hyperlink\Hyperlink;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;

class AdminNavbarSubmenuDropdownHyperlink extends Hyperlink
{

    public function getContent()
    {


        $this->addCssClass('admin-navbar-dropdown-link');
        $this->addCssClass('admin-navbar-link');

        /*$icon= new FontAwesomeIcon($this);  // new AdminIcon($this);
        $icon->addCssClass('admin-navbar-submenu-icon');
        $icon->icon='caret-down';*/

        return parent::getContent();

    }

}