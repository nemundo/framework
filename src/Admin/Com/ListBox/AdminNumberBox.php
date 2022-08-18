<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Html\Form\Input\InputType;

class AdminNumberBox extends AdminTextBox
{

    public function getContent()
    {

        $this->inputType = InputType::NUMBER;
        return parent::getContent();

    }

}