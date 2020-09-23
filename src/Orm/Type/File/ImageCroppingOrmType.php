<?php

namespace Nemundo\Orm\Type\File;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\File\ImageCroppingType;
use Nemundo\Orm\Type\OrmTypeTrait;

class ImageCroppingOrmType extends ImageCroppingType  // AbstractComplexType
{

    use OrmTypeTrait;


    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->typeLabel = 'Cropping Image';
        $this->typeId = 'b5dfaaeb-4c8a-41cf-99df-14ef179d87fc';


    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
    }

    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
    }


    public function getRowCode(PhpClass $phpClass)
    {
    }


}