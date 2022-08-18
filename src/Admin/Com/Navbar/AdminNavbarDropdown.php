<?php

namespace Nemundo\Admin\Com\Navbar;

use Nemundo\Html\Block\Div;
use Nemundo\Html\Inline\Span;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;
use Nemundo\Web\Site\AbstractSite;

class AdminNavbarDropdown extends Div
{

    public $dropdownLabel;


    private $dropdown;


    private $submenuContent;

    private static $dropdownCount = 0;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->dropdown = new AdminNavbarSubmenuDropdownHyperlink($this);
        $this->dropdown->addCssClass('admin-navbar-dropdown-link');
        $this->submenuContent = new Div($this);

    }


    public function getContent()
    {

        //$this->dropdown->content = $this->dropdownLabel.' ';

        AdminNavbarDropdown::$dropdownCount++;

        $dropdownId = 'dropdown-' . AdminNavbarDropdown::$dropdownCount;  // (new UniqueComName())->getUniqueName();
        $this->dropdown->addAttribute('onclick', 'hideNavbarDropdownMenu(); document.getElementById(\'' . $dropdownId . '\').classList.toggle(\'admin-navbar-dropdown-show\');');

        $this->submenuContent->id = $dropdownId;
        $this->submenuContent->addCssClass('admin-navbar-submenu-content');

        $span = new Span($this->dropdown);
        $span->content = $this->dropdownLabel . ' ';

        $icon = new FontAwesomeIcon($this->dropdown);
        $icon->icon = 'chevron-down';

        return parent::getContent();

    }


    public function addSubsite(AbstractSite $site)
    {

        $hyperlink = new AdminSubmenuSiteHyperlink($this->submenuContent);
        $hyperlink->site = $site;

    }


}