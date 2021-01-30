<?php

namespace Nemundo\Orm\Type\Text;


use Nemundo\App\Translation\Type\LanguageType;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;
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

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = 'string[]';

        $phpClass->addUseClass(LanguageType::class);
        $phpClass->addUseClass(TextType::class);

        $phpFunction->add('foreach ((new LanguageType())->getLanguageData() as $languageRow) {');
        $phpFunction->add('if (isset($this->multiText[$languageRow->code])) {');
        $phpFunction->add('$type = new TextType();');
        $phpFunction->add('$type->fieldName = $this->model->' . $this->variableName . '->fieldName."_" . $languageRow->code;');
        $phpFunction->add('$this->typeValueList->setModelValue($type, $this->' . $this->variableName . '[$languageRow->code]);');
        $phpFunction->add('}');
        $phpFunction->add('}');

    }


    public function getRowCode(PhpClass $phpClass)
    {
        $this->addRowPrimitiveVarialbe($phpClass, 'string');

        /*
        $type = new TextType();
        $type->fieldName = $this->model->multiText->fieldName."_" .(new LanguageSession())->getCode();  //getValue();  // $languageRow->code;

        $this->multiText = $this->getModelValue($type);
        */

    }

}