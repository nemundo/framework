<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Html\Form\Input\InputType;

class AdminColorPicker extends AbstractAdminTextBox
{

    public function getContent()
    {

        $this->inputType = InputType::COLOR;
        $this->textInput->addCssClass('admin-textbox-color');
        return parent::getContent();

    }

}