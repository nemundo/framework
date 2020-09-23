<?php

namespace Nemundo\Orm\Type\Web;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Web\PhoneType;
use Nemundo\Orm\Type\OrmTypeTrait;

class PhoneOrmType extends PhoneType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Phone';
        $this->typeId = '41477a64-a1a6-45dd-935a-6d47fcc6861f';
    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, PhoneType::class);
    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, PhoneType::class);
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