<?php

namespace Nemundo\Orm\Type\Language;


use Nemundo\Admin\AppDesigner\Form\Field\Type\TextTypeFormPart;
use Nemundo\Admin\AppDesigner\Item\TextModelFieldAdminItem;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Text\TextType;
use Nemundo\Orm\Type\OrmTypeTrait;

class LanguageTextOrmType extends TextType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Language Text';
        $this->typeName = 'language_text';
        $this->typeId = '';
        $this->adminFormPartClassName = TextTypeFormPart::class;
        $this->adminItemClassName = TextModelFieldAdminItem::class;
    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, TextType::class);
        if ($this->createModelProperty) {
            $phpFunction->add('$this->' . $this->variableName . '->length = ' . $this->length . ';');
        }
    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, TextType::class);
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