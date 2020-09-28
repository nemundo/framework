<?php

namespace Nemundo\Model\Form\Item\File;


use Nemundo\Model\Data\Property\File\MultiRedirectFilenameDataProperty;


class MultiRedirectFilenameModelFormItem extends MultiFileModelFormItem
{

    public function afterSave($id)
    {

        $fileProperty = new MultiRedirectFilenameDataProperty($this->type, $this->typeValueList);

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