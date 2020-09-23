<?php

namespace Nemundo\Orm\Type\Web;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Web\UrlType;
use Nemundo\Orm\Type\OrmTypeTrait;

class UrlOrmType extends UrlType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Url';
        $this->typeId = '8d2fa0f8-6f55-4645-8b20-ab4eb6248480';
    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, UrlType::class);
    }

    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, UrlType::class);
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