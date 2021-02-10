<?php

namespace Nemundo\Model\Form\Item\External;


use Nemundo\Html\Form\FormMethod;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\External\ExternalType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox;


class ExternalModelFormItem extends AbstractModelFormItem
{

    /**
     * @var ExternalType
     */
    public $type;

    /**
     * @var BootstrapModelListBox
     */
    protected $listBox;


    public function loadType(AbstractModelType $type)
    {

        parent::loadType($type);

        $this->listBox = new BootstrapModelListBox($this);
        //$this->listBox->formMethod = FormMethod::POST;
        $this->listBox->connection = $this->connection;
        $this->listBox->label = $this->type->label;
        $this->listBox->name = $this->type->fieldName;
        $this->listBox->validation = $this->type->validation;
        $this->listBox->validationType = $this->type->validationType;
        $this->listBox->emptyValueAsDefault = true;

        $externalModel = (new ModelFactory())->getModelByClassName($this->type->externalModelClassName);

        $this->listBox->model = $externalModel;
        $this->listBox->valueField = $externalModel->id;

        $this->listBox->filter = $this->type->filter;

    }


    public function getContent()
    {

        if ($this->value !== null) {
            $this->listBox->value = $this->value;
        }

        if ($this->row !== null) {
            $this->listBox->value = $this->row->getModelValue($this->type);
        }

        return parent::getContent();
    }


    public function saveValue()
    {

        $this->typeValueList->setModelValue($this->type, $this->listBox->getValue());

    }


    public function checkValue()
    {
        $this->value = $this->listBox->getValue();
        $value = $this->listBox->checkValue();
        return $value;
    }

}