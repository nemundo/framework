<?php

namespace Nemundo\Model\Form\Item\File;


use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Model\Data\Property\File\ImageDataProperty;
use Nemundo\Model\Type\AbstractModelType;

class ImageModelFormItem extends FileModelFormItem
{

    public function loadType(AbstractModelType $type)
    {
        parent::loadType($type);
        $this->fileUpload->acceptFileType = AcceptFileType::IMAGE;
    }


    public function saveValue()
    {

        $fileRequest = $this->fileUpload->getFileRequest();

        if ($fileRequest->filename !== '') {
            $fileProperty = new ImageDataProperty($this->type, $this->typeValueList);
            $fileProperty->fromFileRequest($fileRequest);
        }

    }

}