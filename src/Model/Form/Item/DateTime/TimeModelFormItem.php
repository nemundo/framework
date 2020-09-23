<?php

namespace Nemundo\Model\Form\Item\DateTime;

use Nemundo\Com\FormBuilder\Item\AbstractTextBox;
use Nemundo\Core\Type\DateTime\Time;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class TimeModelFormItem extends AbstractModelFormItem
{

    /**
     * @var AbstractTextBox
     */
    private $textBox;


    public function loadType(AbstractModelType $type)
    {
        parent::loadType($type);

        $this->textBox = new BootstrapTextBox($this);
        $this->textBox->label = $this->type->label;
        $this->textBox->name = $this->type->fieldName;
        $this->textBox->validation = $this->type->validation;
        $this->textBox->validationType = $this->type->validationType;


    }


    public function getContent()
    {

        if ($this->focus) {
            $this->textBox->autofocus = true;
        }

        if ($this->row !== null) {
            $time = new Time($this->row->getModelValue($this->type));
            $this->textBox->value = $time->getIsoTime();
        }

        if ($this->value !== null) {
            $this->textBox->value = $this->value;
        }

        return parent::getContent();

    }


    public function saveValue()
    {
        $value = $this->textBox->getValue();
        $this->typeValueList->setModelValue($this->type, $value);

    }


    public function checkValue()
    {
        $this->value = $this->textBox->getValue();
        $returnValue = $this->textBox->checkValue();
        return $returnValue;
    }


}