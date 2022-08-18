<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Html\Form\Input\InputType;

class AdminDatePicker extends AbstractAdminTextBox
{

    public function getContent()
    {

        $this->inputType = InputType::DATE;
        $this->textInput->addCssClass('admin-input');

        return parent::getContent();

    }


    public function setDateValue(Date $date)
    {

        $this->value=$date->getIsoDate();
        return $this;

    }



    // in trait
    public function getDateValue()
    {

        //$date = null;
        $date=new Date();
        if ($this->hasValue()) {
            $date = new Date($this->getValue());
        }

        return $date;

    }

}