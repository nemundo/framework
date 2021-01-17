<?php


namespace Nemundo\App\Translation\Session;


use Nemundo\App\Translation\Data\Language\LanguageId;
use Nemundo\Core\Http\Session\AbstractSession;

class LanguageSession extends AbstractSession
{

    protected function loadSession()
    {

        $this->sessionName='language';

    }


    // getLanguage
    // default


    public function getLanguageId() {


        // static

        $id=new LanguageId();
        $id->filter->andEqual($id->model->code,$this->getValue());
        $languageId=$id->getId();

        return $languageId;


    }


}