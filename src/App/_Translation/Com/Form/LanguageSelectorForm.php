<?php


namespace Nemundo\App\Translation\Com\Form;


use Nemundo\App\Translation\Com\ListBox\LanguageListBox;
use Nemundo\App\Translation\Session\LanguageSession;
use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;

class LanguageSelectorForm extends AbstractFormBuilder
{

    /**
     * @var LanguageListBox
     */
    private $language;

    public function getContent()
    {

        $formRow=new BootstrapFormRow($this);

        $this->language=new LanguageListBox($formRow);
        $this->language->emptyValueAsDefault=false;
        $this->language->submitOnChange=true;


        $session=new LanguageSession();
        //if ($session->exists()) {
            $this->language->value=$session->getValue();
        //}

        return parent::getContent();

    }


    protected function onSubmit()
    {

        (new LanguageSession())->setValue($this->language->getValue());

    }


}