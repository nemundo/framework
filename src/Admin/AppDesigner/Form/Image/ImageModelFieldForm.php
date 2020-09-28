<?php

namespace Nemundo\Admin\AppDesigner\Form\Image;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppImageResizeType\AppImageResizeTypeListBox;
use Nemundo\Admin\AppDesigner\Data\AppImageType\AppImageType;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldReader;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class ImageModelFieldForm extends BootstrapForm
{

    /**
     * @var string
     */
    public $fieldId;

    /**
     * @var AppImageResizeTypeListBox
     */
    private $resizeType;

    /**
     * @var BootstrapTextBox
     */
    private $size;


    public function getContent()
    {

        $this->resizeType = new AppImageResizeTypeListBox($this);
        $this->resizeType->connection = new AppDesignerConnection();
        $this->resizeType->label = 'Resize Type';
        $this->resizeType->validation = true;

        $this->size = new BootstrapTextBox($this);
        $this->size->label = 'Size';
        $this->size->size = 3;
        $this->size->validation = true;
        $this->size->validationType = ValidationType::IS_NUMBER;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $conn = new AppDesignerConnection();

        $data = new AppImageType();
        $data->connection = $conn;
        $data->appFieldId = $this->fieldId;
        $data->resizeTypeId = $this->resizeType->getValue();
        $data->size = $this->size->getValue();
        $data->save();

        $fieldReader = new AppModelFieldReader();
        $fieldReader->connection = $conn;
        $fieldRow = $fieldReader->getRowById($this->fieldId);

        $orm = new AppDesignerModelOrmSetup();
        $orm->connection = $conn;
        $orm->createOrm($fieldRow->appModelId);

    }

}