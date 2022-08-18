<?php

namespace Nemundo\App\Manifest\Com\JavaScript;

use Nemundo\Html\Script\JavaScript;

class ServiceWorkerJavaScript extends JavaScript
{

    public function getContent()
    {

        $this->addCodeLine('if("serviceWorker" in navigator) {')
            ->addCodeLine('navigator.serviceWorker')
            ->addCodeLine('.register("/serviceworker.js")')
            ->addCodeLine('.then(function() { console.log("service worker is registered"); });')
            ->addCodeLine('}');

        return parent::getContent();

    }

}