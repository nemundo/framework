<?php

namespace Nemundo\Package\GoogleAnalytics;

use Nemundo\Core\Http\Url\UrlBuilder;
use Nemundo\Html\Header\AbstractHeaderHtmlContainer;
use Nemundo\Html\Script\JavaScript;

class GoogleAnalyticsContainer extends AbstractHeaderHtmlContainer
{

    public $analyticsId;

    public function getContent()
    {

        $builder = new UrlBuilder('https://www.googletagmanager.com/gtag/js');
        $builder->addRequestValue('id', $this->analyticsId);

        $script = new JavaScript($this);
        $script->async = true;
        $script->src = (new UrlBuilder('https://www.googletagmanager.com/gtag/js'))
            ->addRequestValue('id', $this->analyticsId)
            ->getUrl();

        (new JavaScript($this))
            ->addContent('window.dataLayer = window.dataLayer || [];')
            ->addContent('function gtag(){dataLayer.push(arguments);}')
            ->addContent('gtag(\'js\', new Date());')
            ->addContent('gtag(\'config\', \'' . $this->analyticsId . '\');');

        return parent::getContent();

    }

}