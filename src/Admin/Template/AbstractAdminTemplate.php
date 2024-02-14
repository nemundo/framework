<?php

namespace Nemundo\Admin\Template;

use Nemundo\Admin\AdminConfig;
use Nemundo\Com\Template\AbstractResponsiveHtmlDocument;
use Nemundo\Core\Language\LanguageConfig;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Html\Script\ModuleJavaScript;
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

        //$script = new JavaScript($this);
        //$script->addCodeLine('WebConfig.webUrl = "' . WebConfig::$webUrl . '";');


        $script = new ModuleJavaScript($this);
        //$script->src = '/package/js/html/Config/WebConfig.js';


        //$script = new JavaScript($this);

        $webConfig = WebConfig::$webUrl;
        if (LanguageConfig::$multiLanguage) {
            $webConfig .= LanguageConfig::$currentLanguageCode . '/';
        }

        $script->addContent('import WebConfig from "/package/js/html/Config/WebConfig.js";WebConfig.webUrl = "' . $webConfig . '";');



        return parent::getContent();

    }

}