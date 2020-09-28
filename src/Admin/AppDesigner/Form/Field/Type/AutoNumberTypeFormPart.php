<?php

namespace Nemundo\Admin\AppDesigner\Form\Field\Type;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppAutoNumberType\AppAutoNumberType;
use Nemundo\Admin\AppDesigner\Data\AppAutoNumberType\AppAutoNumberTypeUpdate;
use Nemundo\Admin\AppDesigner\Data\AppAutoNumberType\AppAutoNumberTypeValue;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class AutoNumberTypeFormPart extends AbstractTypeFormPart
{

    /**
     * @var BootstrapTextBox
     */
    private $startNumber;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->startNumber = new BootstrapTextBox($this);
        $this->startNumber->label = 'Start Number';
        $this->startNumber->value = '1';

    }


    public function getContent()
    {

        if ($this->fieldId !== null) {

            $value = new AppAutoNumberTypeValue();
            $value->connection = new AppDesignerConnection();
            $value->field = $value->model->startNumber;
            $value->filter->andEqual($value->model->appFieldId, $this->fieldId);
            $this->startNumber->value = $value->getValue();

        }

        return parent::getContent();
    }


    public function saveData($fieldId)
    {

        $data = new AppAutoNumberType();
        $data->connection = new AppDesignerConnection();
        $data->appFieldId = $fieldId;
        $data->startNumber = $this->startNumber->getValue();
        $data->save();

    }


    public function updateData()
    {

        $update = new AppAutoNumberTypeUpdate();
        $update->connection = new AppDesignerConnection();
        $update->filter->andEqual($update->model->appFieldId, $this->fieldId);
        $update->startNumber = $this->startNumber->getValue();
        $update->update();

    }


}