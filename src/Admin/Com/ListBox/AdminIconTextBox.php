<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Admin\Com\Icon\AdminIcon;

class AdminIconTextBox extends AdminTextBox
{

    /**
     * @var string
     */
    public $icon;


    /**
     * @var AdminIcon
     */
    protected $adminIcon;

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->adminIcon = new AdminIcon($this);

    }


    public function getContent()
    {

        $this->addCssClass('admin-icon-textbox');
        $this->adminIcon->icon = $this->icon;

        return parent::getContent();

    }

}