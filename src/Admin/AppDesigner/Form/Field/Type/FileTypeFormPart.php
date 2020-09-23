<?php

namespace Nemundo\Admin\AppDesigner\Form\Field\Type;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppFileType\AppFileType;
use Nemundo\Admin\AppDesigner\Data\AppFileType\AppFileTypeCount;
use Nemundo\Admin\AppDesigner\Data\AppFileType\AppFileTypeUpdate;
use Nemundo\Admin\AppDesigner\Data\AppFileType\AppFileTypeValue;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;


class FileTypeFormPart extends AbstractTypeFormPart
{

    /**
     * @var BootstrapCheckBox
     */
    private $keepOrginalFilename;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->keepOrginalFilename = new BootstrapCheckBox($this);
        $this->keepOrginalFilename->label = 'Keep Orginal Filename';

    }


    public function getContent()
    {

        if ($this->fieldId !== null) {

            $value = new AppFileTypeValue();;
            $value->connection = new AppDesignerConnection();
            $value->field = $value->model->keepOrginalFilename;
            $value->filter->andEqual($value->model->appFieldId, $this->fieldId);
            $this->keepOrginalFilename->value = $value->getValue();

        }

        return parent::getContent();

    }


    public function saveData($fieldId)
    {

        $data = new AppFileType();
        $data->connection = new AppDesignerConnection();
        $data->appFieldId = $fieldId;
        $data->keepOrginalFilename = $this->keepOrginalFilename->getValue();
        $data->save();

    }


    public function updateData()
    {

        $count = new AppFileTypeCount();
        $count->connection = new AppDesignerConnection();
        $count->filter->andEqual($count->model->appFieldId, $this->fieldId);
        if ($count->getCount() == 0) {
            $this->saveData($this->fieldId);
        }

        $update = new AppFileTypeUpdate();
        $update->connection = new AppDesignerConnection();
        $update->filter->andEqual($update->model->appFieldId, $this->fieldId);
        $update->keepOrginalFilename = $this->keepOrginalFilename->getValue();
        $update->update();

    }

}