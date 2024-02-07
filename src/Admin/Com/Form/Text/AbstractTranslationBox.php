<?php

namespace Nemundo\Admin\Com\Form\Text;

use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Core\Language\LanguageConfig;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;

abstract class AbstractTranslationBox extends Div
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var bool
     */
    public $autofocus = false;

    /**
     * @var string|string[]
     */
    public $label;

    /**
     * @var bool
     */
    public $validation = false;

    /**
     * @var AdminTextBox[]
     */
    private $languageTextBoxList = [];


    private $p;


    protected function loadContainer()
    {


        parent::loadContainer();

        $this->p = new Paragraph($this);

    }


    public function getContent()
    {

        $this->p->content = $this->label;
        return parent::getContent();

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