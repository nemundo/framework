<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Admin\Com\Icon\AdminIcon;

class AdminIconTextBox extends AdminTextBox
{

    /**
     * @var string
     */
    public $icon;

    public function getContent()
    {

        $this->addCssClass('admin-icon-textbox');

        $icon = new AdminIcon($this);
        $icon->icon = $this->icon;

        return parent::getContent();

    }

}