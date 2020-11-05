<?php


namespace Nemundo\Package\NemundoJs;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Web\WebConfig;

class NemundoJsScript extends AbstractContainer
{

    use LibraryTrait;


    public function getContent()
    {
        $this->addJavaScript('WebConfig.webUrl = "' . WebConfig::$webUrl . '";');
        //$this->addJavaScript('let webUrl = "' . WebConfig::$webUrl . '";');
        return parent::getContent();
    }



}