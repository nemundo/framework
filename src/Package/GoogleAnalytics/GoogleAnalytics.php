<?php

namespace Nemundo\Package\GoogleAnalytics;

use Nemundo\Html\Header\AbstractHeaderHtmlContainer;
use Nemundo\Html\Script\JavaScript;

class GoogleAnalytics extends AbstractHeaderHtmlContainer
{

    public $googleAnalyticsId;

    public function getContent()
    {

        $script = new JavaScript($this);
        $script->src = 'https://www.googletagmanager.com/gtag/js?id=' . $this->googleAnalyticsId;

        $script = new JavaScript($this);
        $script->addContent('window.dataLayer = window.dataLayer || [];');
        $script->addContent('function gtag(){dataLayer.push(arguments);}');
        $script->addContent('gtag("js", new Date());');
        $script->addContent('gtag("config", "' . $this->googleAnalyticsId . '");');

        return parent::getContent();

    }

}