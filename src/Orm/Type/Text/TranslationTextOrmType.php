<?php

namespace Nemundo\Orm\Type\Text;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Text\TextType;
use Nemundo\Model\Type\Text\TranslationTextType;
use Nemundo\Orm\Type\OrmTypeTrait;

class TranslationTextOrmType extends TextOrmType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Translation Text';
        $this->typeName = 'translation_text';
        $this->typeId = '6ed62749-871d-4317-959d-fdeb90ceabea';
        //$this->adminFormPartClassName = TextTypeFormPart::class;
        //$this->adminItemClassName = TextModelFieldAdminItem::class;
    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, TranslationTextType::class);
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