<?php

namespace Nemundo\Com\Template;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Html\Document\AbstractHtmlDocument;
use Nemundo\Html\Header\Meta\Meta;
use Nemundo\Html\Header\Title;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Package\Jquery\Code\JqueryReadyCode;

class TemplateHtmlDocument extends AbstractHtmlDocument
{

    use LibraryTrait;


    protected function loadContainer()
    {

        parent::loadContainer();

   /*     $script = new JavaScript();
        LibraryTrait::$readyCode = new JqueryReadyCode($script);

        LibraryHeader::addHeaderContainer($script);*/


    }


    public function getContent()
    {

        $library = new LibraryHeader($this);

        $title = new Title($library);
        $title->content = LibraryHeader::$documentTitle;

        $meta = new Meta($this);
        $meta->addAttribute('charset', 'UTF-8');



        return parent::getContent();

    }

}