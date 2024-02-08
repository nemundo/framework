<?php

namespace Nemundo\Orm\Type\Text;

use Nemundo\Core\Language\LanguageConfig;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;

trait TranslationOrmTrait
{

    public function getRowCode(PhpClass $phpClass)
    {

        $phpClass->addUseClass(LanguageConfig::class);

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = 'string|string[]';

        $phpClass->addConstructor('if ($multiLanguage) {');
        $phpClass->addConstructor('$data = [];');
        $phpClass->addConstructor('foreach ((new LanguageConfig())->getLanguageList() as $language) {');
        $phpClass->addConstructor('$data[$language] = $this->getValue($model->' . $this->variableName . '->aliasFieldName."_".$language);');
        $phpClass->addConstructor('}');
        $phpClass->addConstructor('$this->' . $this->variableName . ' = $data;');
        $phpClass->addConstructor('} else {');
        $phpClass->addConstructor('$this->' . $this->variableName . ' = $this->getModelValue($model->' . $this->variableName . ');');
        $phpClass->addConstructor('}');

    }


    private function getTranslationDataCode(PhpClass $phpClass, PhpFunction $phpFunction, $typeClass, $typeText)
    {

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = 'string[]';

        $phpClass->addUseClass(LanguageConfig::class);
        $phpClass->addUseClass($typeClass);

        $phpFunction->add('foreach (LanguageConfig::$languageList as $language) {');
        $phpFunction->add('if (isset($this->' . $var->variableName . '[$language])) {');
        $phpFunction->add('$type = new ' . $typeText . 'Type();');
        $phpFunction->add('$type->fieldName = $this->model->' . $this->variableName . '->fieldName."_" . $language;');
        $phpFunction->add('$this->typeValueList->setModelValue($type, $this->' . $this->variableName . '[$language]);');
        $phpFunction->add('}');
        $phpFunction->add('}');

    }

}