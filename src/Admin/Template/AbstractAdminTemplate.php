<?php

namespace Nemundo\Admin\Template;

use Nemundo\Admin\AdminConfig;
use Nemundo\Com\Template\AbstractResponsiveHtmlDocument;
use Nemundo\Package\FontAwesome\FontAwesomePackage;

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

}