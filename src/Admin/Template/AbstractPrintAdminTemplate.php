<?php

namespace Nemundo\Admin\Template;

use Nemundo\Html\Document\AbstractHtmlDocument;
use Nemundo\Html\Header\Link\StylesheetLink;
use Nemundo\Html\Header\Title;

abstract class AbstractPrintAdminTemplate extends AbstractHtmlDocument
{

    public $printTitle;

    public function getContent()
    {

        $style = new StylesheetLink($this);
        $style->href = '/package/css/framework/print/print.css';

        $title = new Title($this);
        $title->content = $this->printTitle;

        return parent::getContent();

    }

}