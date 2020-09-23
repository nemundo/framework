<?php

namespace Nemundo\Orm\Type\Number;


use Nemundo\Admin\AppDesigner\Form\Field\Type\AutoNumberTypeFormPart;
use Nemundo\Admin\AppDesigner\Item\AutoNumberModelFieldAdminItem;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Number\AutoNumberType;
use Nemundo\Orm\Type\OrmTypeTrait;

class AutoNumberOrmType extends AutoNumberType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Auto Number';
        $this->typeId = 'd534c939-a5b2-46f7-b2c6-2c8ab4ef08df';
        $this->adminFormPartClassName = AutoNumberTypeFormPart::class;
        $this->adminItemClassName = AutoNumberModelFieldAdminItem::class;
    }

    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, AutoNumberType::class);
        $phpFunction->add('$this->' . $this->variableName . '->startNumber = ' . $this->startNumber . ';');
    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, AutoNumberType::class);
    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

    }


    public function getRowCode(PhpClass $phpClass)
    {
        $this->addRowPrimitiveVarialbe($phpClass, 'int');
    }

}