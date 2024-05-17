<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\DateTime\Time;
use Nemundo\Html\Form\Input\InputType;

class AdminTimePicker extends AdminTextBox
{

    public function getContent()
    {

        $this->inputType = 'time'; // InputType::::DATE_TIME;
        return parent::getContent();

    }


    public function setTime(Time $time)
    {

        $this->value = $time->getTimeLeadingZero();
        return $this;

    }


    public function getTime()
    {

        $time = new Time($this->getValue());
        return $time;

    }


}