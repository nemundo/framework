<?php

namespace Nemundo\Admin\Com\Form\Geo;

use Nemundo\Admin\Com\ListBox\AdminNumberBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Com\JavaScript\Module\ModuleJavaScript;
use Nemundo\Com\Package\PackageTrait;
use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\OpenLayers\Com\OpenStreetMap;
use Nemundo\Package\OpenLayers\Package\OpenLayersPackage;

class AdminGeoCoordinateTextBox extends AdminTextBox  // Div
{

    use PackageTrait;

    /**
     * @var BootstrapTextBox
     */
    private $lat;

    /**
     * @var BootstrapTextBox
     */
    private $lon;



    protected function loadContainer()
    {

        parent::loadContainer();
        $this->name = "geo_input";

    }


    public function getContent()
    {

        $this->addPackage(new OpenLayersPackage());

        $script=new ModuleJavaScript($this);
        $script->src='/js/framework/Admin/Input/admin_geo_coordinate.js';

        //$this->textInput->addCssClass("geo_input");
        //$this->textInput->id = "geo_input";
        //$this->name = "geo_input";
        $this->id='geo_input_map';


        /*$map = new OpenStreetMap($this);
        $map->zoom=1;

        $map->mapCenter= new GeoCoordinate();
        $map->mapCenter->latitude=0;
        $map->mapCenter->longitude=0;*/


        return parent::getContent();

    }


    public function setGeoCoordinate(AbstractGeoCoordinate $geoCoordinate) {

        $this->value = $geoCoordinate->getText();

    }


    public function getGeoCoordinate() {


        $geoCoordinate=new GeoCoordinate();
        $geoCoordinate->fromText($this->getValue());

        return $geoCoordinate;

    }

}