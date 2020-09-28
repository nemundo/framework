<?php

namespace Nemundo\Admin\AppDesigner\Form\Field\Type;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppExternalUserType\AppExternalUserType;
use Nemundo\Admin\AppDesigner\Data\AppExternalUserType\AppExternalUserTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppExternalUserType\AppExternalUserTypeUpdate;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;

class ExternalUserTypeFormPart extends AbstractTypeFormPart
{

    /**
     * @var BootstrapCheckBox
     */
    private $loadModel;

    protected function loadContainer()
    {
        parent::loadContainer();

        $this->loadModel = new BootstrapCheckBox($this);
        $this->loadModel->label = 'Load Model';

    }


    public function getContent()
    {

        if ($this->fieldId !== null) {

            $reader = new AppExternalUserTypeReader();
            $reader->connection = new AppDesignerConnection();
            $reader->filter->andEqual($reader->model->appFieldId, $this->fieldId);
            $row = $reader->getRow();

            $this->loadModel->value = $row->appLoadModel;

        }

        return parent::getContent();
    }


    public function saveData($fieldId)
    {

        $data = new AppExternalUserType();
        $data->connection = new AppDesignerConnection();
        $data->appFieldId = $fieldId;
        $data->appLoadModel = $this->loadModel->getValue();
        $data->save();

    }


    public function updateData()
    {

        $update = new AppExternalUserTypeUpdate();
        $update->connection = new AppDesignerConnection();
        $update->filter->andEqual($update->model->appFieldId, $this->fieldId);
        $update->appLoadModel = $this->loadModel->getValue();
        $update->update();

    }

}