<?php

namespace Nemundo\Admin\Com\ListBox;

// TextBox
class AdminTextBox extends AbstractAdminTextBox
{

    public function getContent()
    {

        $this->textInput->addCssClass('admin-input');
        $this->textInput->autocomplete=false;
        return parent::getContent();

    }

}