<?php

namespace Nemundo\Model\Form\Item\DateTime;


use Nemundo\Com\FormBuilder\Item\AbstractDatePicker;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapDatePicker;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class DateTimeModelFormItem extends AbstractModelFormItem
{

    /**
     * @var AbstractDatePicker
     */
    private $datePicker;


    /**
     * @var BootstrapTextBox
     */
    private $time;


    public function loadType(AbstractModelType $type)
    {

        parent::loadType($type);

        $this->datePicker = new BootstrapDatePicker($this);
        $this->datePicker->label = $this->type->label;
        $this->datePicker->name = $this->type->fieldName;
        $this->datePicker->validation = $this->type->validation;
        $this->datePicker->validationType = $this->type->validationType;

        $this->time = new BootstrapTextBox($this);
        $this->time->label = 'Time';
        $this->time->value = '00:00';

    }


    public function getContent()
    {

        if ($this->focus) {
            $this->datePicker->autofocus = true;
        }

        if ($this->value !== null) {
            $this->datePicker->value = $this->value;
        }

        if ($this->row !== null) {
            $this->datePicker->value = $this->row->getModelValue($this->type);
        }


        return parent::getContent();
    }


    public function saveValue()
    {
        $date = new Date($this->datePicker->getValue());
        $this->typeValueList->setModelValue($this->type, $date->getIsoDateFormat());
    }


    public function checkValue()
    {
        $value = $this->datePicker->checkValue();
        return $value;
    }

}