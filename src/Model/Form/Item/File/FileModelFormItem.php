<?php

namespace Nemundo\Model\Form\Item\File;

use Nemundo\Html\Form\FormMethod;
use Nemundo\Model\Data\Property\File\FileDataProperty;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\File\FileType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;

class FileModelFormItem extends AbstractModelFormItem
{


    /**
     * @var FileType
     */
    public $type;

    /**
     * @var BootstrapFileUpload
     */
    protected $fileUpload;


    public function loadType(AbstractModelType $type)
    {
        parent::loadType($type);

        $this->fileUpload = new BootstrapFileUpload($this);
        //$this->fileUpload->formMethod = FormMethod::POST;
        $this->fileUpload->label = $this->type->label;
        $this->fileUpload->name = $this->type->fieldName;
        $this->fileUpload->validation = $type->validation;
        $this->fileUpload->acceptFileType = $this->type->acceptFileType;

    }


    public function saveValue()
    {

        $fileRequest = $this->fileUpload->getFileRequest();

        if ($fileRequest->filename !== '') {
            $fileProperty = new FileDataProperty($this->type, $this->typeValueList);
            $fileProperty->fromFileRequest($fileRequest);
        }

    }


    public function checkValue()
    {
        $value = $this->fileUpload->checkValue();
        return $value;
    }

}