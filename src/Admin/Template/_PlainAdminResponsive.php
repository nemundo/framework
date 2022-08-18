<?php


namespace Nemundo\Admin\Template;


use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Com\Package\PackageTrait;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Com\Template\AbstractResponsiveHtmlDocument;
use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Html\Header\Link\StylesheetLink;
use Nemundo\Html\Header\Meta\Meta;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Html\Script\JavaScriptType;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Web\WebConfig;

class PlainAdminResponsive extends AbstractResponsiveHtmlDocument
{

    use PackageTrait;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->addPackage(new FontAwesomePackage());


    }


    public function getContent()
    {

        $this

            ->addStylesheet('/css/framework/app.css')
            ->addStylesheet('/css/framework/navigation.css')
            ->addStylesheet('/css/framework/loader.css')
            ->addStylesheet('/css/framework/progress.css')
            ->addStylesheet('/css/framework/tooltip.css')
            ->addStylesheet('/css/framework/breadcrumb.css')
            ->addStylesheet('/css/framework/layout.css')
            ->addStylesheet('/css/framework/modal.css')
            ->addStylesheet('/css/framework/widget.css')


            ->addStylesheet('/css/button.css')
            ->addStylesheet('/css/pagination.css')
            ->addStylesheet('/css/dropdown.css')
            ->addStylesheet('/css/autocomplete.css')
            ->addStylesheet('/css/card.css')

            ->addStylesheet('/css/html/body.css')
            ->addStylesheet('/css/html/form.css')
            ->addStylesheet('/css/html/table.css')

            ->addStylesheet('/css/icon.css')

            ->addStylesheet('/css/bim/unity.css')
            ->addStylesheet('/css/memory/memory.css')
        ;


        $script = new JavaScript($this);
        $script->type=JavaScriptType::MODULE;
        $script->addCodeLine('import WebConfig from "/js/html/Config/WebConfig.js";');
        $script->addCodeLine('WebConfig.webUrl = "' . WebConfig::$webUrl . '";');

        $meta = new Meta($this);
        $meta->name = 'viewport';
        $meta->content='width=device-width, initial-scale=1.0';

        return parent::getContent();

    }


    private function addStylesheet($url) {

        $style=new StylesheetLink($this);
        $style->href = $url;

        return $this;

    }


}