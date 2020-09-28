<?php

namespace Nemundo\App\ModelDesigner\Type\Form;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppTextType\AppTextType;
use Nemundo\Admin\AppDesigner\Data\AppTextType\AppTextTypeUpdate;
use Nemundo\Admin\AppDesigner\Data\AppTextType\AppTextTypeValue;
use Nemundo\App\ModelDesigner\Type\TextModelDesignerType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class TextTypeFormPart extends AbstractModelDesignerTypeFormPart
{

    /**
     * @var TextModelDesignerType
     */
    public $type;


    /**
     * @var BootstrapTextBox
     */
    private $length;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->length = new BootstrapTextBox($this);
        $this->length->label = 'Length';

    }


    public function getContent()
    {


        $this->length->value = $this->type->length;

        return parent::getContent();

    }



    public function getJson()
    {


        $this->type->length = $this->length->getValue();

        /*

        $json=[];
        $json['length']=$this->length->getValue();
        return $json;*/

    }



    /*
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

    }*/

}