<?php

namespace Nemundo\Admin\Com\ListBox;

class AdminTextBox extends AbstractAdminTextBox
{

    public function getContent()
    {

        $this->textInput->addCssClass('admin-input');
        $this->textInput->autocomplete = false;
        return parent::getContent();

    }

}