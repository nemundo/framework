<?php


namespace Nemundo\App\Translation\Language;


use Nemundo\App\Translation\Data\Language\LanguageId;
use Nemundo\App\Translation\Data\Language\LanguageReader;
use Nemundo\Core\Base\AbstractBase;

abstract class AbstractLanguage extends AbstractBase
{

    public $code;

    public $language;

    /**
     * @var bool
     */
    public $defaultLanguage=false;

    abstract protected function loadLanguage();

    public function __construct()
    {
        $this->loadLanguage();
    }


    public function getLanguageId() {

        $id=new LanguageId();
        $id->filter->andEqual($id->model->code,$this->code);
        $languageId=$id->getId();

        return $languageId;


    }



    public function getText($code) {



    }




}