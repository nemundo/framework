<?php

namespace Nemundo\Model\Form\Item\Text;

use Nemundo\Html\Form\FormMethod;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapHtmlEditor;

class HtmlModelFormItem extends AbstractModelFormItem
{

    /**
     * @var BootstrapHtmlEditor
     */
    private $htmlEditor;

    public function loadType(AbstractModelType $type)
    {
        parent::loadType($type);

        $this->htmlEditor = new BootstrapHtmlEditor($this);
        //$this->htmlEditor->formMethod = FormMethod::POST;
        $this->htmlEditor->label = $this->type->label;
        $this->htmlEditor->name = $this->type->fieldName;
        $this->htmlEditor->validation = $this->type->validation;
        $this->htmlEditor->validationType = $this->type->validationType;

    }

    public function getContent()
    {

        if ($this->focus) {
            $this->htmlEditor->autofocus = true;
        }

        $this->htmlEditor->value = $this->value;

        return parent::getContent();
    }


    public function saveValue()
    {
        // TODO: Implement saveValue() method.
    }

    /*
        public function getValue(AbstractModelDataDataUpdate $data)
        {
            $data->setValue($this->type, $this->htmlEditor->getValue());
        }*/


    public function checkValue()
    {
        $this->value = $this->htmlEditor->getValue();
        $value = $this->htmlEditor->checkValue();
        return $value;
    }

}