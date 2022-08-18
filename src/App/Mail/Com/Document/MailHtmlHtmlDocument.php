<?php

namespace Nemundo\App\Mail\Com\Document;

use Nemundo\Css\Builder\CssStyleBuilder;
use Nemundo\Html\Document\AbstractHtmlDocument;

class MailHtmlHtmlDocument extends AbstractMailHtmlDocument  // AbstractHtmlDocument
{

    public function getContent()
    {

      /*  $builder = new CssStyleBuilder();
        $builder->margin = '0';
        $builder->padding = '0';

        $this->body->addAttribute('style', $builder->getStyle());*/

        return parent::getContent();

    }

}