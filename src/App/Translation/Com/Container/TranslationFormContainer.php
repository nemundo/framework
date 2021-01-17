<?php

namespace Nemundo\App\Translation\Com\Container;


use Nemundo\App\Translation\Data\Language\LanguageReader;
use Nemundo\App\Translation\Data\TextTranslation\TextTranslation;
use Nemundo\App\Translation\Language\DefaultLanguage;
use Nemundo\App\Translation\Text\TranslationText;
use Nemundo\App\Translation\Type\Source\AbstractSourceType;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class TranslationFormContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractSourceType
     */
    public $sourceType;

    public $source;

    /**
     * @var BootstrapTextBox[]
     */
    private $translation = [];


    protected function loadContainer()
    {

        $p = new Paragraph($this);
        $p->content = 'Label Translation';

        $defaultLanguage = new DefaultLanguage();

        $reader = new LanguageReader();
        $reader->addOrder($reader->model->code);

//        foreach ((new LanguageTranslationReader())->getLanguageReader()->getData() as $languageRow) {
        foreach ($reader->getData() as $languageRow) {

            $formRow = new BootstrapFormRow($this);

            $this->translation[$languageRow->code] = new BootstrapTextBox($formRow);

            $label = $languageRow->code;
            /*if ($languageRow->id == $defaultLanguage->id) {
                $label .= ' (Default)';
                $this->translation[$languageRow->easyLanguage]->validation = true;
            }*/

            $this->translation[$languageRow->code]->label = $label;

        }

    }


    public function getContent()
    {

        if ($this->source !== null) {

            $p=new Paragraph($this);
            $p->content='Source: '.$this->source;

            $reader = new LanguageReader();
            $reader->addOrder($reader->model->code);
            foreach ($reader->getData() as $languageRow) {
                $this->translation[$languageRow->code]->value = 'test';

                $text = (new TranslationText())->getText($this->source,$languageRow->id, $this->sourceType->getId());
                $this->translation[$languageRow->code]->value = $text;

            }

        }

        return parent::getContent();

    }


    public function saveTranslation($source)
    {

        $reader = new LanguageReader();
        foreach ($reader->getData() as $languageRow) {

            (new TranslationText())->saveText($languageRow->id,$source,$this->sourceType,$this->translation[$languageRow->code]->getValue());

        }

    }

}