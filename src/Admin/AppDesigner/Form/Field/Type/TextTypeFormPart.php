<?php

namespace Nemundo\Admin\AppDesigner\Form\Field\Type;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppTextType\AppTextType;
use Nemundo\Admin\AppDesigner\Data\AppTextType\AppTextTypeUpdate;
use Nemundo\Admin\AppDesigner\Data\AppTextType\AppTextTypeValue;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class TextTypeFormPart extends AbstractTypeFormPart
{

    /**
     * @var BootstrapTextBox
     */
    private $length;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->length = new BootstrapTextBox($this);
        $this->length->label = 'Length';
        $this->length->value = '255';

    }


    public function getContent()
    {

        if ($this->fieldId !== null) {

            $value = new AppTextTypeValue();
            $value->connection = new AppDesignerConnection();
            $value->field = $value->model->length;
            $value->filter->andEqual($value->model->appFieldId, $this->fieldId);
            $this->length->value = $value->getValue();

        }

        return parent::getContent();

    }


    public function saveData($fieldId)
    {

        $data = new AppTextType();
        $data->connection = new AppDesignerConnection();
        $data->appFieldId = $fieldId;
        $data->length = $this->length->getValue();
        $data->save();

    }


    public function updateData()
    {

        $update = new AppTextTypeUpdate();
        $update->connection = new AppDesignerConnection();
        $update->filter->andEqual($update->model->appFieldId, $this->fieldId);
        $update->length = $this->length->getValue();
        $update->update();

    }

}