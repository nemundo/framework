<?php


namespace Nemundo\Package\OpenLayers\Package;


use Nemundo\Com\Package\Type\AbstractAssetPackage;
use Nemundo\FrameworkProject;

class OpenLayersPackage extends AbstractAssetPackage  // AbstractPackage
{

    protected function loadPackage()
    {

        $this->project=new FrameworkProject();
        $this->packageName='open_layers';
        $this->addCss('ol.css');
        $this->addJs('ol.js');

    }

}