<?php

namespace Nemundo\App\Translation\Com\Container;


use Nemundo\App\Translation\Data\Language\LanguageReader;
use Nemundo\App\Translation\Text\TranslationText;
use Nemundo\App\Translation\Type\LanguageType;
use Nemundo\App\Translation\Type\Source\AbstractSourceType;
use Nemundo\Db\Sql\Order\SortOrder;
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

    public $label;

    /**
     * @var BootstrapTextBox[]
     */
    private $translation = [];


    protected function loadContainer()
    {

        parent::loadContainer();

        if ($this->label !== null) {
            $p = new Paragraph($this);
            $p->content = $this->label;
        }

        foreach ((new LanguageType())->getLanguageData() as $languageRow) {

            $formRow = new BootstrapFormRow($this);

            $this->translation[$languageRow->code] = new BootstrapTextBox($formRow);

            $label = $languageRow->code;
            if ($languageRow->default) {
                $label .= ' (default)';
            }

            $this->translation[$languageRow->code]->label = $label;

        }

    }


    public function getContent()
    {

        if ($this->source !== null) {

            $p = new Paragraph($this);
            $p->content = 'Source: ' . $this->source;

            foreach ((new LanguageType())->getLanguageData() as $languageRow) {
                $this->translation[$languageRow->code]->value = 'test';

                $text = (new TranslationText())->getText($this->source, $languageRow->id, $this->sourceType->getId());
                $this->translation[$languageRow->code]->value = $text;

            }

        }

        return parent::getContent();

    }


    public function getTextList()
    {


        $text = [];
        foreach ((new LanguageType())->getLanguageData() as $languageRow) {
            $text[$languageRow->code] = $this->translation[$languageRow->code]->getValue();
            //(new TranslationText())->saveText($languageRow->id, $source, $this->sourceType, $this->translation[$languageRow->code]->getValue());
        }

        return $text;

    }



    public function saveTranslation($source)
    {


        foreach ((new LanguageType())->getLanguageData() as $languageRow) {

            (new TranslationText())->saveText($languageRow->id, $source, $this->sourceType, $this->translation[$languageRow->code]->getValue());

        }

    }



    /*
    public function setValue($textList) {


        foreach ((new LanguageType())->getLanguageData() as $languageRow) {
            $this->translation[$languageRow->code]->value = 'test';

            $text = (new TranslationText())->getText($this->source, $languageRow->id, $this->sourceType->getId());
            $this->translation[$languageRow->code]->value = $text;

        }


    }*/


}