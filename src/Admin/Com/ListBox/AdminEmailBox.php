<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Core\Validation\ValidationType;
use Nemundo\Html\Form\Input\InputType;

// EmailTextBox
class AdminEmailBox extends AdminTextBox
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->inputType = InputType::EMAIL;
        $this->validationType= ValidationType::IS_EMAIL;
        $this->label = 'eMail';

    }

}