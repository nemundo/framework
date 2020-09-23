<?php

namespace Nemundo\Package\Bootstrap\FormElement;

use Nemundo\Model\ListBox\ModelListBoxTrait;
use Nemundo\Model\Type\AbstractModelType;

class BootstrapModelListBox extends BootstrapListBox
{

    use ModelListBoxTrait;

    /**
     * @var AbstractModelType
     */
    public $valueField;

    /**
     * @var AbstractModelType[]
     */
    private $labelField = [];


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->loadModelListBox();
    }


    public function addLabelField(AbstractModelType $type)
    {
        $this->labelField[] = $type;
    }


    public function getContent()
    {

        $this->loadHtml();

        if ($this->label == null) {
            $this->label = $this->model->label;
            if ($this->label == null) {
                $this->label = $this->model->tableName;
            }
        }

        foreach ($this->model->getDefaultTypeList() as $type) {
            $this->addLabelField($type);
        }

        foreach ($this->reader->getData() as $row) {

            $label = '';
            foreach ($this->labelField as $field) {
                if ($label !== '') {
                    $label .= ' ';
                }
                $label .= $row->getModelValue($field);
            }

            $value = null;
            if ($this->valueField !== null) {
                $value = $row->getModelValue($this->valueField);
            } else {
                $value = $row->getModelValue($this->model->id);
            }

            $this->addItem($value, $label);

        }

        return parent::getContent();
    }

}