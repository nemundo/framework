<?php

namespace Nemundo\Orm\Type\Php;


use Nemundo\Admin\AppDesigner\Form\Field\Type\PhpClassTypeFormPart;
use Nemundo\Admin\AppDesigner\Item\PhpClassModelFieldAdminItem;
use Nemundo\Core\System\ObjectBuilder;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Php\PhpClassType;
use Nemundo\Orm\Type\OrmTypeTrait;
use Nemundo\Orm\Utility\UppercaseFirstLetter;

class PhpClassOrmType extends PhpClassType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {

        parent::loadExternalType();
        $this->typeLabel = 'Php Class';
        $this->typeId = '8c6bee59-9cd9-4715-9f36-f40acf896465';
        $this->adminItemClassName = PhpClassModelFieldAdminItem::class;
        $this->adminFormPartClassName = PhpClassTypeFormPart::class;

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, PhpClassType::class);

        $phpClass = new Text($this->phpClassName);
        $phpClass->prefixIfNotExists('\\');

        $phpFunction->add('$this->' . $this->variableName . '->phpClassName = ' . $phpClass->getValue() . '::class;');

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, PhpClassType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataPrimitiveVariable($phpClass, $phpFunction, 'string');

    }

    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowPrimitiveVarialbe($phpClass, 'string');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'get' . (new UppercaseFirstLetter())->uppercaseFirstLetter($this->variableName) . 'Object()';
        $function->returnDataType = $this->prefixClassName($this->phpClassName);
        $function->add('$object = (new ' . $this->prefixClassName(ObjectBuilder::class) . ')->getObject($this->' . $this->variableName . ');');

        $function->add('return $object;');

    }

}