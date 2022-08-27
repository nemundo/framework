<?php

namespace Nemundo\Admin\Com\Autocomplete;

use Nemundo\Admin\Com\ListBox\AdminSearchTextBox;
use Nemundo\Com\JavaScript\Module\ModuleJavaScript;

class AdminAutocompleteSearchTextBox extends AdminSearchTextBox
{

    public $webService;

    public function getContent()
    {

        //$this->id = 'search-one';

        $this->textInput->id = 'search-one';

        $module = new ModuleJavaScript($this);
        $module->src = '/package/js/framework/Admin/Autocomplete/autocomplete.js';

        return parent::getContent();
    }

}