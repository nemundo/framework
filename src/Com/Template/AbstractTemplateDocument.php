<?php

namespace Nemundo\Com\Template;

use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Response\HttpResponse;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Document\AbstractDocument;
use Nemundo\Html\Header\AbstractHeaderHtmlContainer;

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


        //$this->getContainerList()

        //(new Debug())->write($this->containerList);


        /*foreach ($this->getContainerList(true) as $container) {


            (new Debug())->write('container'.$container->getClassName());

            /*if ($container->isObjectOfClass(AbstractHeaderHtmlContainer::class)) {
                $page->addHeaderContainer($container);
            } else {
                $page->addContainer($container);
            }*/


        /*    $page->addContainer($container);*/

        //}

        $page->render();


        /*
        $response = new HttpResponse();
        $response->content = $page->getContent();
        $response->statusCode = $this->statusCode;
        $response->sendResponse();*/

    }

}