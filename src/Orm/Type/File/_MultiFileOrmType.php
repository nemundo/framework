<?php

namespace Nemundo\Orm\Type\File;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Data\Property\File\MultiFileDataProperty;
use Nemundo\Model\Reader\Property\File\MultiFileReaderProperty;
use Nemundo\Model\Type\File\MultiFileType;
use Nemundo\Orm\Type\OrmTypeTrait;

class MultiFileOrmType extends MultiFileType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Multi File';
        $this->typeId = '1e31eed8-75ee-4176-857d-c9b0e8bf5cf4';
    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, MultiFileType::class);

    }

    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
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