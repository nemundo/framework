<?php

namespace Nemundo\Package\Bootstrap\Document;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Core\Debug\Debug;
use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Html\Header\Meta\Meta;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Package\Bootstrap\Package\BootstrapPackage;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Package\Jquery\Code\JqueryReadyCode;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\JqueryUi\JqueryUiPackage;
use Nemundo\Package\Popper\PopperPackage;

class BootstrapDocument extends HtmlDocument
{

    use LibraryTrait;

    /**
     * @var JqueryReadyCode
     */
    private $jquery;

    protected function loadContainer()
    {

        $this->addPackage(new JqueryPackage());
        $this->addPackage(new JqueryUiPackage());
        $this->addPackage(new PopperPackage());
        $this->addPackage(new BootstrapPackage());
        $this->addPackage(new FontAwesomePackage());

        $script = new JavaScript($this);
        LibraryTrait::$readyCode = new JqueryReadyCode($script);

        parent::loadContainer();
        $this->jquery = new JqueryReadyCode();

    }


    public function getContent()
    {

        //(new Debug())->write('getcontent');

        $meta = new Meta($this);
        $meta->addAttribute('name', 'viewport');
        $meta->addAttribute('content', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no');
        //$this->addHeaderContainer($meta);

        $script = new JavaScript($this);
        LibraryTrait::$readyCode = new JqueryReadyCode($script);
        //$this->addHeaderContainer($script);

        return parent::getContent();

    }

}