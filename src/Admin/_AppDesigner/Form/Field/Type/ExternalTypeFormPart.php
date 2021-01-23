<?php

namespace Nemundo\Admin\AppDesigner\Form\Field\Type;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppExternalType\AppExternalType;
use Nemundo\Admin\AppDesigner\Data\AppExternalType\AppExternalTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppExternalType\AppExternalTypeUpdate;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelListBox;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ExternalTypeFormPart extends AbstractTypeFormPart
{

    /**
     * @var AppModelListBox
     */
    private $externalModel;

    /**
     * @var BootstrapCheckBox
     */
    private $loadModel;

    protected function loadContainer()
    {
        parent::loadContainer();

        $this->externalModel = new BootstrapListBox($this);
        $this->externalModel->label = 'External Model';
        $this->externalModel->validation = true;

        $this->loadModel = new BootstrapCheckBox($this);
        $this->loadModel->label = 'Load Model';

        $modelReader = new AppModelReader();
        $modelReader->connection = new AppDesignerConnection();
        $modelReader->filter->andEqual($modelReader->model->active, true);
        $modelReader->addOrder($modelReader->model->modelLabel);
        $modelReader->addOrder($modelReader->model->modelNamespace);

        foreach ($modelReader->getData() as $modelRow) {
            $label = $modelRow->modelLabel . ' (' . $modelRow->modelNamespace . ')';
            $this->externalModel->addItem($modelRow->id, $label);
        }

    }


    public function getContent()
    {

        if ($this->fieldId !== null) {

            $reader = new AppExternalTypeReader();
            $reader->connection = new AppDesignerConnection();
            $reader->filter->andEqual($reader->model->appFieldId, $this->fieldId);
            $row = $reader->getRow();

            $this->externalModel->value = $row->externalModelId;
            $this->loadModel->value = $row->appLoadModel;

        }

        return parent::getContent();
    }


    public function saveData($fieldId)
    {

        $data = new AppExternalType();
        $data->connection = new AppDesignerConnection();
        $data->appFieldId = $fieldId;
        $data->externalModelId = $this->externalModel->getValue();
        $data->appLoadModel = $this->loadModel->getValue();
        $data->save();

    }


    public function updateData()
    {

        $update = new AppExternalTypeUpdate();
        $update->connection = new AppDesignerConnection();
        $update->filter->andEqual($update->model->appFieldId, $this->fieldId);
        $update->externalModelId = $this->externalModel->getValue();
        $update->appLoadModel = $this->loadModel->getValue();
        $update->update();

    }

}