<?php

namespace Nemundo\Admin\Com\Dropdown;

use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Utility\UniqueComName;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractContainer;

class _AbstractAdminDropdown extends AbstractContainer
{

    use LibraryTrait;

    //public $dropdownLabel = 'Click';

    /**
     * @var AdminButton
     */
    public $button;

    /**
     * @var Div
     */
    public $content;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->addJsUrl('/js/framework/Admin/Dropdown/dropdown.js');

        //admin-dropdown-show
       /* $dropdownId = 'dropone-' . (new UniqueComName())->getUniqueName();

        $this->button = new AdminButton();
        $this->button->label = 'Click';
        $this->button->addCssClass('admin-dropdown-button');
        $this->button->addAttribute('onclick', 'hideDropdownMenu(); document.getElementById(\'' . $dropdownId . '\').classList.toggle(\'admin-dropdown-show\');');
        parent::addContainer($this->button);

        $this->content = new Div();
        $this->content->id = $dropdownId;
        $this->content->addCssClass('admin-dropdown-content');*/
        parent::addContainer($this->content);

    }


    public function addContainer(AbstractContainer $container)
    {

        $this->content->addContainer($container);

    }


    public function getContent()
    {

        $this->button->label = $this->dropdownLabel;

        return parent::getContent();
    }


}