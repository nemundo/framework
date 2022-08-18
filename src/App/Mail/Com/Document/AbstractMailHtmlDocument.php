<?php

namespace Nemundo\App\Mail\Com\Document;

use Nemundo\Css\Builder\CssStyleBuilder;
use Nemundo\Html\Document\AbstractHtmlDocument;
use Nemundo\Html\Header\Meta\Meta;

abstract class AbstractMailHtmlDocument extends AbstractHtmlDocument
{

    public function getContent()
    {

        $builder = new CssStyleBuilder();
        $builder->margin = '0';
        $builder->padding = '0';

        $this->body->addAttribute('style', $builder->getStyle());


        $meta = new Meta($this);
        $meta->addAttribute('charset', 'UTF-8');

        $meta = new Meta($this);
        $meta->addAttribute('name', 'viewport');
        $meta->addAttribute('content', 'width=device-width, initial-scale=1.0');

        return parent::getContent();

    }

}