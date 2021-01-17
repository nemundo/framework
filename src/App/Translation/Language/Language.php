<?php


namespace Nemundo\App\Translation\Language;

// LanguageType
use Nemundo\App\Translation\Data\Language\LanguageReader;
use Nemundo\Core\Log\LogMessage;

class Language extends AbstractLanguage
{

    public $languageId;

    protected function loadLanguage()
    {
        // TODO: Implement loadLanguage() method.
    }


    public function fromId($languageId) {


        $reader=new LanguageReader();
        $reader->filter->andEqual($reader->model->id,$languageId);
        foreach ($reader->getData() as $languageRow) {

            $this->languageId=$languageRow->id;
            $this->code=$languageRow->code;
            $this->language=$languageRow->language;

        }


    }



    public function fromCode($code) {




        $reader=new LanguageReader();
        $reader->filter->andEqual($reader->model->code,$code);
        foreach ($reader->getData() as $languageRow) {

            $this->languageId=$languageRow->id;
            $this->code=$languageRow->code;
            $this->language=$languageRow->language;

        }

        if ($reader->getCount() == 0) {
            (new LogMessage())->writeError('No Language found. Code: '.$code);
        }


        return $this;

    }


}