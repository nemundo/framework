<?php


namespace Nemundo\App\Translation\Language;

// LanguageType
use Nemundo\App\Translation\Data\Language\LanguageReader;

class DefaultLanguage extends AbstractLanguage
{

    public $languageId;

    protected function loadLanguage()
    {
        // TODO: Implement loadLanguage() method.



        $reader=new LanguageReader();
        $reader->filter->andEqual($reader->model->default,true);
        foreach ($reader->getData() as $languageRow) {

            $this->languageId=$languageRow->id;
            $this->code=$languageRow->code;
            $this->language=$languageRow->language;

        }


    }

}