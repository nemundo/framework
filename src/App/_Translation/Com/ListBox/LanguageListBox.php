<?php

namespace Nemundo\App\Translation\Com\ListBox;

use Nemundo\App\Translation\Data\Language\LanguageReader;
use Nemundo\App\Translation\Type\LanguageType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class LanguageListBox extends BootstrapListBox
{
    public function getContent()
    {

        $this->label = 'Language';

        //$reader=new LanguageReader();
        //$reader->addOrder($reader->model->language);
        foreach ((new LanguageType())->getLanguageData() as $languageRow) {
            $this->addItem($languageRow->id,$languageRow->language);
        }

        return parent::getContent();
    }
}