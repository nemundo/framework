<?php

namespace Nemundo\Com\Template;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Html\Document\AbstractHtmlDocument;
use Nemundo\Html\Header\Meta\Meta;
use Nemundo\Html\Header\Title;

class TemplateHtmlDocument extends AbstractHtmlDocument
{

    use LibraryTrait;

    public function getContent()
    {

        $library = new LibraryHeader($this);

        /*$title = new Title($library);
        $title->content = LibraryHeader::$documentTitle;*/

        $meta = new Meta($this);
        $meta->addAttribute('charset', 'UTF-8');

        return parent::getContent();

    }

}