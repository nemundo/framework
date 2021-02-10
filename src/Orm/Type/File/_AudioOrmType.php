<?php

namespace Nemundo\Orm\Type\File;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Data\Property\File\FileDataProperty;
use Nemundo\Model\Reader\Property\File\FileReaderProperty;
use Nemundo\Model\Type\File\AudioType;
use Nemundo\Orm\Type\OrmTypeTrait;

class AudioOrmType extends AudioType
{

    use OrmTypeTrait;


    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Audio';
        $this->typeId = '619c46e7-c9ea-4eae-8158-f7ef1a821db0';
    }

    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, AudioType::class);
    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, AudioType::class);
    }

    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addDataProperty($phpClass, FileDataProperty::class);

    }

    public function getRowCode(PhpClass $phpClass)
    {
        $this->addRowProperty($phpClass, FileReaderProperty::class);
    }

}