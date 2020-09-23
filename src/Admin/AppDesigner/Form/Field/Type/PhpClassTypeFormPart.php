<?php

namespace Nemundo\Admin\AppDesigner\Form\Field\Type;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppPhpClassType\AppPhpClassType;
use Nemundo\Admin\AppDesigner\Data\AppPhpClassType\AppPhpClassTypeUpdate;
use Nemundo\Admin\AppDesigner\Data\AppPhpClassType\AppPhpClassTypeValue;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class PhpClassTypeFormPart extends AbstractTypeFormPart
{

    /**
     * @var BootstrapTextBox
     */
    private $phpClassName;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->phpClassName = new BootstrapTextBox($this);
        $this->phpClassName->label = 'Php Class Name';
        $this->phpClassName->validation = true;

    }


    public function getContent()
    {

        if ($this->fieldId !== null) {

            $value = new AppPhpClassTypeValue();
            $value->connection = new AppDesignerConnection();
            $value->field = $value->model->phpClassName;
            $value->filter->andEqual($value->model->appFieldId, $this->fieldId);
            $this->phpClassName->value = $value->getValue();

        }

        return parent::getContent();

    }


    public function saveData($fieldId)
    {

        $data = new AppPhpClassType();
        $data->connection = new AppDesignerConnection();
        $data->appFieldId = $fieldId;
        $data->phpClassName = $this->phpClassName->getValue();
        $data->save();

    }


    public function updateData()
    {

        $update = new AppPhpClassTypeUpdate();
        $update->connection = new AppDesignerConnection();
        $update->filter->andEqual($update->model->appFieldId, $this->fieldId);
        $update->phpClassName = $this->phpClassName->getValue();
        $update->update();

    }

}