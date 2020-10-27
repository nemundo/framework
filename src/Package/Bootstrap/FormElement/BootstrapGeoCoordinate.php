<?php

namespace Nemundo\Package\Bootstrap\FormElement;

use Nemundo\Core\Language\LanguageCode;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;

class BootstrapGeoCoordinate extends AbstractContainer
{

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

        $formRow = new BootstrapFormRow($this);

        $this->lat = new BootstrapTextBox($formRow);
        $this->lat->label = 'Lat';
        /*$this->lat->label[LanguageCode::EN] = 'From';
        $this->from->label[LanguageCode::DE] = 'Von';*/

        $this->lon = new BootstrapTextBox($formRow);
        $this->lon->label = 'Lon';

        /*$this->lon->label[LanguageCode::EN] = 'To';
        $this->lon>label[LanguageCode::DE] = 'Bis';*/

    }


    /*
    public function getContent()
    {

        $this->from->searchMode = $this->searchMode;
        $this->to->searchMode = $this->searchMode;

        return parent::getContent();

    }*/


    public function getGeoCoordinate()
    {

        $geoCoordinate=new GeoCoordinate();
        $geoCoordinate->latitude=$this->lat->getValue();
        $geoCoordinate->longitude=$this->lon->getValue();

        return $geoCoordinate;

    }



}