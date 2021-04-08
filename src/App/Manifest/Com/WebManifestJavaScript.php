<?php


namespace Nemundo\App\Manifest\Com;


use Nemundo\Html\Script\JavaScript;
use Nemundo\Web\WebConfig;

class WebManifestJavaScript extends JavaScript
{

    public function getContent()
    {

        $url = WebConfig::$webUrl.'js/serviceworker.js';

        $this->addCodeLine('if ("serviceWorker" in navigator) {');
        $this->addCodeLine('navigator.serviceWorker.register("'.$url.'");');
        $this->addCodeLine('}');

        return parent::getContent();

    }

}