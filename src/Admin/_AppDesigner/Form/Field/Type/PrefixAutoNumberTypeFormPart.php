<?php

namespace Nemundo\Admin\AppDesigner\Form\Field\Type;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType\AppPrefixAutoNumberType;
use Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType\AppPrefixAutoNumberTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType\AppPrefixAutoNumberTypeUpdate;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class PrefixAutoNumberTypeFormPart extends AbstractTypeFormPart
{

    /**
     * @var BootstrapTextBox
     */
    private $prefix;

    /**
     * @var BootstrapTextBox
     */
    private $startNumber;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->prefix = new BootstrapTextBox($this);
        $this->prefix->label = 'Prefix';
        $this->prefix->validation = true;

        $this->startNumber = new BootstrapTextBox($this);
        $this->startNumber->label = 'Start Number';
        $this->startNumber->validation = true;
        $this->startNumber->validationType = ValidationType::IS_NUMBER;
        $this->startNumber->value = 1;

    }


    public function getContent()
    {

        if ($this->fieldId !== null) {

            $reader = new AppPrefixAutoNumberTypeReader();
            $reader->connection = new AppDesignerConnection();
            $reader->filter->andEqual($reader->model->appFieldId, $this->fieldId);
            $row = $reader->getRow();
            $this->prefix->value = $row->prefix;
            $this->startNumber->value = $row->startNumber;

        }

        return parent::getContent();
    }


    public function saveData($fieldId)
    {

        $data = new AppPrefixAutoNumberType();
        $data->connection = new AppDesignerConnection();
        $data->appFieldId = $fieldId;
        $data->prefix = $this->prefix->getValue();
        $data->startNumber = $this->startNumber->getValue();
        $data->save();

    }


    public function updateData()
    {

        $update = new AppPrefixAutoNumberTypeUpdate();
        $update->connection = new AppDesignerConnection();
        $update->filter->andEqual($update->model->appFieldId, $this->fieldId);
        $update->prefix = $this->prefix->getValue();
        $update->startNumber = $this->startNumber->getValue();
        $update->update();

    }

}