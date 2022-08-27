<?php

namespace Nemundo\Admin\Com\Dropdown;

use Nemundo\Admin\Com\Icon\AdminIcon;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\Utility\UniqueComName;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Web\Site\AbstractSite;


// AdminSiteDropdown
class AdminDropdown extends Div
{

    use LibraryTrait;

    public $dropdownLabel;

    public $dropdownIconName = 'chevron-down';

    /**
     * @var AdminIcon
     */
    public $button;

    /**
     * @var Div
     */
    public $content;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->addJsUrl('/package/js/framework/Admin/Dropdown/dropdown.js');
        $dropdownId = 'dropone-' . (new UniqueComName())->getUniqueName();

        $this->button = new AdminIcon();
        $this->button->addCssClass('admin-dropdown-button');
        $this->button->addAttribute('onclick', 'hideDropdownMenu(); document.getElementById(\'' . $dropdownId . '\').classList.toggle(\'admin-dropdown-show\');');
        parent::addContainer($this->button);

        $this->content = new Div();
        $this->content->id = $dropdownId;
        $this->content->addCssClass('admin-dropdown-content');
        parent::addContainer($this->content);

    }


    public function addContainer(AbstractContainer $container)
    {

        $this->content->addContainer($container);

    }


    public function addSite(AbstractSite $site)
    {

        $hyperlink = new SiteHyperlink($this->content);
        $hyperlink->addCssClass('admin-dropdown-content-item');
        $hyperlink->site = $site;

        return $this;

    }


    public function getContent()
    {

        $this->button->icon = $this->dropdownIconName;

        return parent::getContent();

    }

}