<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Html\Form\Input\InputType;

class AdminDateTimePicker extends AdminTextBox
{

    public function getContent()
    {

        $this->inputType = InputType::DATE_TIME;
        return parent::getContent();

    }


    public function setDateTime(DateTime $dateTime)
    {

        $this->value = $dateTime->getIsoDateTime();
        return $this;

    }


    public function getDateTime()
    {

        $dateTime = new DateTime($this->getValue());
        return $dateTime;

    }


}