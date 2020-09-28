<?php

namespace Nemundo\Model\Form\Item\File;


use Nemundo\Html\Form\Input\AcceptFileType;


use Nemundo\Model\Type\AbstractModelType;


class ImageCroppingModelFormItem extends FileModelFormItem
{

    public function loadType(AbstractModelType $type)
    {
        parent::loadType($type);
        $this->fileUpload->acceptFileType = AcceptFileType::IMAGE;
    }


    /*
    public function getValue(AbstractModelDataDataUpdate $data)
    {
        $fileProperty = new ImageDataProperty($data, $this->type);
        $fileProperty->fromFileRequest($this->fileUpload->getFileRequest());


        $cropping = new CropperJs($this);

    }*/


}