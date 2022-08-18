<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Core\Language\LanguageCode;

class AdminSearchTextBox extends AdminIconTextBox
{

    public function getContent()
    {

        $this->placeholder[LanguageCode::EN] = 'Search';
        $this->placeholder[LanguageCode::DE] = 'Suchen';

        $this->icon = 'search';
        $this->name = 'q';

        return parent::getContent();

    }

}