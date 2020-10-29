<?php

namespace Nemundo\Com\Template;

use Nemundo\Core\Http\Response\HttpResponse;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Document\AbstractDocument;

class AbstractTemplateDocument extends AbstractDocument
{

    public $pageTitle;

    public function render()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $page->title =  $this->pageTitle;

        /*
        if ($this->pageTitle !== null) {
            $page->title ='123'. $this->pageTitle;
        }*/

        $page->addContainer($this);

        $response = new HttpResponse();
        $response->content = $page->getContent();
        $response->statusCode = $this->statusCode;
        $response->sendResponse();

    }

}