<?php

namespace Nemundo\Admin\Com\HtmlEditor;

use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Package\CkEditor5\CkEditor5Trait;

class AdminHtmlEditor extends AdminLargeTextBox
{

    use CkEditor5Trait;

    public function getContent()
    {

        $this->loadCkEditor($this->name);
        return parent::getContent();

    }

}
