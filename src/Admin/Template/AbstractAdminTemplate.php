<?php

namespace Nemundo\Admin\Template;

use Nemundo\Admin\AdminConfig;
use Nemundo\Com\Template\AbstractResponsiveHtmlDocument;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Package\FontAwesome\Package\FontAwesomePackage;
use Nemundo\Web\WebConfig;

abstract class AbstractAdminTemplate extends AbstractResponsiveHtmlDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        if (AdminConfig::$documentTitle !== null) {
            $this->pageTitle = AdminConfig::$documentTitle;
        }

        if (AdminConfig::$defaultStylesheet !== null) {
            $this->addCssUrl(AdminConfig::$defaultStylesheet);
        }

        $this->addPackage(new FontAwesomePackage());

    }


    public function getContent()
    {

        $script = new JavaScript($this);
        $script->addCodeLine('WebConfig.webUrl = "' . WebConfig::$webUrl . '";');

        return parent::getContent();

    }

}