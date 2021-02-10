<?php

namespace Nemundo\Model\Form\Item\DateTime;


use Nemundo\Com\FormBuilder\Item\AbstractDatePicker;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapDatePicker;

class DateModelFormItem extends AbstractModelFormItem
{

    /**
     * @var AbstractDatePicker
     */
    private $datePicker;


    public function loadType(AbstractModelType $type)
    {

        parent::loadType($type);

        $this->datePicker = new BootstrapDatePicker($this);
        $this->datePicker->label = $this->type->label;
        $this->datePicker->name = $this->type->fieldName;
        $this->datePicker->validation = $this->type->validation;
        $this->datePicker->validationType = $this->type->validationType;

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
            $value = $this->row->getModelValue($this->type);
            if ($value !== '0000-00-00') {
                $this->datePicker->value = $value;
            }
        }

        return parent::getContent();

    }


    public function saveValue()
    {

        $value = $this->datePicker->getValue();
        if ($value !== '') {
            $date = new Date($value);
            $this->typeValueList->setModelValue($this->type, $date->getIsoDateFormat());
        }
    }


    public function checkValue()
    {
        $value = $this->datePicker->checkValue();
        return $value;
    }

}