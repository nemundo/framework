<?php


namespace Nemundo\App\Translation\Session;


use Nemundo\App\Translation\Data\Language\LanguageReader;
use Nemundo\Core\Http\Session\AbstractSession;

class LanguageSession extends AbstractSession
{


    // static


    protected function loadSession()
    {

        $this->sessionName = 'language';

    }


    public function getCode() {


        $languageRow = (new LanguageReader())->getRowById($this->getValue());
        return $languageRow->code;


    }



    // getLanguageId
    public function getValue()
    {


        $value = null;

        if ($this->hasValue()) {
            $value = parent::getValue();
        } else {

            $reader = new LanguageReader();
            $reader->filter->andEqual($reader->model->default,true);
            foreach ($reader->getData() as $languageRow) {
                $value=$languageRow->id;
            }

        }

        return $value;

    }



    // getLanguage
    // default


    /*
    public function getLanguageId() {


        // static

        $id=new LanguageId();
        $id->filter->andEqual($id->model->code,$this->getValue());
        $languageId=$id->getId();

        return $languageId;


    }*/


}