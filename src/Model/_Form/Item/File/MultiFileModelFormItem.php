<?php

namespace Nemundo\Model\Form\Item\File;


use Nemundo\Model\Data\Property\File\MultiFileDataProperty;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\File\MultiFileType;

class MultiFileModelFormItem extends FileModelFormItem
{

    /**
     * @param AbstractModelType|MultiFileType $type
     */
    public function loadType(AbstractModelType $type)
    {
        parent::loadType($type);

        $this->fileUpload->multiUpload = true;
        $this->fileUpload->acceptFileType = $type->acceptFileType;

    }


    public function saveValue()
    {

    }


    public function afterSave($id)
    {

        $fileProperty = new MultiFileDataProperty($this->type, $this->typeValueList);

        foreach ($this->fileUpload->getMultiFileRequest() as $fileUpload) {
            $fileProperty->fromFileRequest($fileUpload);
        }

        $fileProperty->saveData($id);

    }


    public function checkValue()
    {
        $value = $this->fileUpload->checkValue();
        return $value;
    }

}