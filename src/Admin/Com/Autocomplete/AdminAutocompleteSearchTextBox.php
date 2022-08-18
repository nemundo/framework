<?php

namespace Nemundo\Admin\Com\Autocomplete;

use Nemundo\Admin\Com\ListBox\AdminSearchTextBox;
use Nemundo\Com\JavaScript\Module\ModuleJavaScript;

class AdminAutocompleteSearchTextBox extends AdminSearchTextBox
{

    public $webService;

    public function getContent()
    {

        //$this->id

        $module=new ModuleJavaScript($this);
        $module->src='/js/framework/Admin/Autocomplete/autocomplete.js';

        return parent::getContent();
    }

}