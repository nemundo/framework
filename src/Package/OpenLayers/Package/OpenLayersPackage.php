<?php


namespace Nemundo\Package\OpenLayers\Package;


use Nemundo\Com\Package\AbstractPackage;

class OpenLayersPackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName='open_layers';
        $this->addCss('ol.css');
        $this->addJs('ol.js');

    }

}