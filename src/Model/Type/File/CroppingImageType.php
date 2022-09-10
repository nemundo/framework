<?php

namespace Nemundo\Model\Type\File;

use Nemundo\Model\ModelConfig;
use Nemundo\Model\Type\Complex\AbstractComplexType;
use Nemundo\Model\Type\Number\NumberType;

class CroppingImageType extends AbstractComplexType
{

    /**
     * @var NumberType
     */
    public $x;

    /**
     * @var NumberType
     */
    public $y;

    /**
     * @var NumberType
     */
    public $width;

    /**
     * @var NumberType
     */
    public $heigth;

    /**
     * @var FileType
     */
    public $orginalImage;

    /**
     * @var FileType
     */
    public $croppingImage;



    protected function loadExternalType()
    {

        $this->fieldMapping = false;

        $this->x = new NumberType();
        $this->addType($this->x);

        $this->y = new NumberType();
        $this->addType($this->y);

        $this->width = new NumberType();
        $this->addType($this->width);

        $this->heigth = new NumberType();
        $this->addType($this->heigth);

        $this->orginalImage= new FileType();
        $this->addType($this->orginalImage);

        $this->croppingImage= new FileType();
        $this->addType($this->croppingImage);

    }


    public function createObject()
    {

        $this->x->fieldName = $this->fieldName . '_x';
        $this->x->aliasFieldName = $this->aliasFieldName . '_x';
        $this->x->tableName = $this->tableName;
        $this->x->allowNullValue = $this->allowNullValue;

        $this->y->fieldName = $this->fieldName . '_y';
        $this->y->aliasFieldName = $this->aliasFieldName . '_y';
        $this->y->tableName = $this->tableName;
        $this->y->allowNullValue = $this->allowNullValue;

        $this->width->fieldName = $this->fieldName . '_width';
        $this->width->aliasFieldName = $this->aliasFieldName . '_width';
        $this->width->tableName = $this->tableName;
        $this->width->allowNullValue = $this->allowNullValue;

        $this->heigth->fieldName = $this->fieldName . '_heigth';
        $this->heigth->aliasFieldName = $this->aliasFieldName . '_heigth';
        $this->heigth->tableName = $this->tableName;
        $this->heigth->allowNullValue = $this->allowNullValue;

        $this->orginalImage->fieldName = $this->fieldName . '_image';
        $this->orginalImage->aliasFieldName = $this->aliasFieldName . '_image';
        $this->orginalImage->tableName = $this->tableName;
        //$this->heigth->allowNullValue = $this->allowNullValue;

        $this->croppingImage->fieldName = $this->fieldName . '_image_cropping';
        $this->croppingImage->aliasFieldName = $this->aliasFieldName . '_image_cropping';
        $this->croppingImage->tableName = $this->tableName;

    }

}