<?php

namespace Nemundo\Admin\Com\Form\Text;

use Nemundo\Admin\Com\ListBox\AdminHtmlEditor;
use Nemundo\Core\Language\LanguageConfig;

class TranslationHtmlEditor extends AbstractTranslationBox
{

    /**
     * @var AdminHtmlEditor[]
     */
    private $languageHtmlEditorList = [];


    protected function loadContainer()
    {

        parent::loadContainer();

        foreach ((new LanguageConfig())->getLanguageList() as $language) {

            $this->languageHtmlEditorList[$language] = new AdminHtmlEditor($this);
            $this->languageHtmlEditorList[$language]->label = $language;
            $this->languageHtmlEditorList[$language]->validation = $this->validation;

        }

    }


    public function setValue($data)
    {

        foreach ((new LanguageConfig())->getLanguageList() as $language) {
            if (isset($data[$language])) {
                $this->languageHtmlEditorList[$language]->value = $data[$language];
            }
        }

    }


    public function getValue()
    {

        $data = [];
        foreach ((new LanguageConfig())->getLanguageList() as $language) {
            $data[$language] = $this->languageHtmlEditorList[$language]->getValue();
        }

        return $data;

    }

}