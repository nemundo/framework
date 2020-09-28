<?php

namespace Nemundo\Orm\Type\File;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Data\Property\File\MultiFileDataProperty;
use Nemundo\Model\Reader\Property\File\MultiFileReaderProperty;
use Nemundo\Model\Type\File\MultiImageType;
use Nemundo\Orm\Type\OrmTypeTrait;

class MultiImageOrmType extends MultiImageType
{

    use OrmTypeTrait;


    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Multi Image';
        $this->typeId = 'e82b4561-bf51-475d-9b6e-fc3568749cea';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, MultiImageType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, MultiImageType::class);

    }

    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addDataProperty($phpClass, MultiFileDataProperty::class);
    }

    public function getDataAfterSaveCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $phpFunction->add('$this->' . $this->variableName . '->saveData($id);');

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowProperty($phpClass, MultiFileReaderProperty::class);

    }


}