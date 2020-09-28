<?php

namespace Nemundo\Orm\Type\Number;


use Nemundo\Admin\AppDesigner\Form\Field\Type\PrefixAutoNumberTypeFormPart;
use Nemundo\Admin\AppDesigner\Item\PrefixAutoNumberModelFieldAdminItem;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Reader\Property\Number\PrefixAutoNumberReaderProperty;
use Nemundo\Model\Type\Number\PrefixAutoNumberType;
use Nemundo\Orm\Type\OrmTypeTrait;

class PrefixAutoNumberOrmType extends PrefixAutoNumberType
{

    use OrmTypeTrait;


    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Prefix Auto Number';
        $this->typeId = 'bc5a6aed-4f43-46f5-bc17-26c162c39d34';
        $this->adminFormPartClassName = PrefixAutoNumberTypeFormPart::class;
        $this->adminItemClassName = PrefixAutoNumberModelFieldAdminItem::class;
    }

    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, PrefixAutoNumberType::class);
        $phpFunction->add('$this->' . $this->variableName . '->startNumber = ' . $this->startNumber . ';');
        $phpFunction->add('$this->' . $this->variableName . '->prefix = "' . $this->prefix . '";');

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, PrefixAutoNumberType::class);


    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowProperty($phpClass, PrefixAutoNumberReaderProperty::class);

    }


}