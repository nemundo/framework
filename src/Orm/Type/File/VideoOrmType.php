<?php

namespace Nemundo\Orm\Type\File;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Data\Property\File\FileDataProperty;
use Nemundo\Model\Reader\Property\File\FileReaderProperty;
use Nemundo\Model\Type\File\VideoType;
use Nemundo\Orm\Type\OrmTypeTrait;

class VideoOrmType extends VideoType
{

    use OrmTypeTrait;


    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Video';
        $this->typeId = '589c750d-b94c-495b-9f01-73bdae9d5869';
    }

    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, VideoType::class);
    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, VideoType::class);
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