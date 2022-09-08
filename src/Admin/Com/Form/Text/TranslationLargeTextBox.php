<?php

namespace Nemundo\Admin\Com\Form\Text;

use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Language\LanguageConfig;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;

class TranslationLargeTextBox extends AbstractTranslationBox
{

    /**
     * @var AdminLargeTextBox[]
     */
    private $languageTextBoxList = [];


    protected function loadContainer()
    {

        parent::loadContainer();

        foreach ((new LanguageConfig())->getLanguageList() as $language) {

            $this->languageTextBoxList[$language] = new AdminLargeTextBox($this);
            $this->languageTextBoxList[$language]->label = $language;

        }


    }


    public function setValue($data) {

        foreach ((new LanguageConfig())->getLanguageList() as $language) {
            if (isset($data[$language])) {
            $this->languageTextBoxList[$language]->value= $data[$language];
            }
        }

    }


    public function getValue()
    {

        $data = [];
        foreach ((new LanguageConfig())->getLanguageList() as $language) {
            $data[$language] = $this->languageTextBoxList[$language]->getValue();
        }

        return $data;

    }

}