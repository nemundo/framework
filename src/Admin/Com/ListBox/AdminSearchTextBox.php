<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Core\Language\LanguageCode;

class AdminSearchTextBox extends AdminIconTextBox
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->name = 'q';

    }


    public function getContent()
    {

        $this->placeholder[LanguageCode::EN] = 'Search';
        $this->placeholder[LanguageCode::DE] = 'Suchen';

        $this->icon = 'search';

        return parent::getContent();

    }

}