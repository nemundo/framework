<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Html\Form\Input\InputType;

class AdminPasswordBox extends AdminTextBox
{

    public function getContent()
    {

        $this->inputType = InputType::PASSWORD;
        return parent::getContent();

    }

}