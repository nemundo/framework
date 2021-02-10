<?php

namespace Nemundo\Model\Form\Item\File;

use Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty;
use Nemundo\Model\Type\File\RedirectFilenameType;

class RedirectFilenameModelFormItem extends FileModelFormItem
{

    /**
     * @var RedirectFilenameType
     */
    public $type;



    public function saveValue()
    {
        $fileProperty = new RedirectFilenameDataProperty($this->type, $this->typeValueList);
        $fileProperty->fromFileRequest($this->fileUpload->getFileRequest());

    }


    public function checkValue()
    {
        $value = true;
        return $value;
    }

}