<?php

namespace Nemundo\Orm\Type\Language;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Text\LargeTextType;
use Nemundo\Orm\Type\OrmTypeTrait;

class LanguageLargeTextOrmType extends LargeTextType
{

    use OrmTypeTrait;


    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->typeLabel = 'Large Text';
        $this->typeName='large_text';
        $this->typeId = '';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, LargeTextType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, LargeTextType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataPrimitiveVariable($phpClass, $phpFunction, 'string');

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowPrimitiveVarialbe($phpClass, 'string');

    }


}