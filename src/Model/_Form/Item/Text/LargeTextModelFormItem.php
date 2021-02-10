<?php

namespace Nemundo\Model\Form\Item\Text;

use Nemundo\Html\Form\FormMethod;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;

class LargeTextModelFormItem extends AbstractModelFormItem
{

    /**
     * @var BootstrapLargeTextBox
     */
    private $largeTextBox;

    public function loadType(AbstractModelType $type)
    {
        parent::loadType($type);

        $this->largeTextBox = new BootstrapLargeTextBox($this);
        //$this->largeTextBox->formMethod = FormMethod::POST;
        $this->largeTextBox->label = $this->type->label;
        $this->largeTextBox->name = $this->type->fieldName;
        $this->largeTextBox->validation = $this->type->validation;
        $this->largeTextBox->validationType = $this->type->validationType;

    }


    public function getContent()
    {

        if ($this->focus) {
            $this->largeTextBox->autofocus = true;
        }

        if ($this->value !== null) {
            $this->largeTextBox->value = $this->value;
        }

        if ($this->row !== null) {
            $this->largeTextBox->value = $this->row->getModelValue($this->type);
        }

        return parent::getContent();
    }


    public function saveValue()
    {
        $value = $this->largeTextBox->getValue();
        $this->typeValueList->setModelValue($this->type, $value);

    }


    public function checkValue()
    {
        $this->value = $this->largeTextBox->getValue();
        $value = $this->largeTextBox->checkValue();
        return $value;
    }

}