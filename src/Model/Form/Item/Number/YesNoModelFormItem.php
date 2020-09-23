<?php

namespace Nemundo\Model\Form\Item\Number;


use Nemundo\Html\Form\FormMethod;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;

class YesNoModelFormItem extends AbstractModelFormItem
{

    /**
     * @var BootstrapCheckBox
     */
    private $checkBox;


    public function loadType(AbstractModelType $type)
    {

        parent::loadType($type);

        $this->checkBox = new BootstrapCheckBox($this);
        //$this->checkBox->formMethod = FormMethod::POST;
        $this->checkBox->label = $this->type->label;
        $this->checkBox->name = $this->type->fieldName;
        $this->checkBox->validation = $this->type->validation;

    }

    public function getContent()
    {
        $this->value = $this->checkBox->getValue();

        if ($this->value !== null) {
            $this->checkBox->value = $this->value;
        }

        if ($this->row !== null) {
            $this->checkBox->value = $this->row->getModelValue($this->type);
        }

        return parent::getContent();
    }


    public function saveValue()
    {
        $value = $this->checkBox->getValue();
        $this->typeValueList->setModelValue($this->type, $value);

    }


    public function checkValue()
    {
        $value = $this->checkBox->checkValue();
        return $value;
    }

}