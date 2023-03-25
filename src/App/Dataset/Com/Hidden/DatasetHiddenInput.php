<?php

namespace Nemundo\App\Dataset\Com\Hidden;

use Nemundo\App\Dataset\Parameter\DatasetParameter;
use Nemundo\Html\Form\Input\HiddenInput;

class DatasetHiddenInput extends HiddenInput
{

    public function getContent()
    {

        $parameter = new DatasetParameter();

        $this->name = $parameter->getParameterName();
        $this->value = $parameter->getValue();

        return parent::getContent();

    }

}