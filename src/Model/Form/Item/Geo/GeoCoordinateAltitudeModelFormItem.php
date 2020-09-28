<?php

namespace Nemundo\Model\Form\Item\Geo;

use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Nemundo\Model\Data\Property\Geo\GeoCoordinateAltitudeDataProperty;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Reader\Property\Geo\GeoCoordinateAltitudeReaderProperty;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\Geo\GeoCoordinateAltitudeType;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class GeoCoordinateAltitudeModelFormItem extends AbstractModelFormItem
{

    /**
     * @var GeoCoordinateAltitudeType
     */
    public $type;

    /**
     * @var BootstrapTextBox
     */
    private $latTextBox;

    /**
     * @var BootstrapTextBox
     */
    private $lonTextBox;

    /**
     * @var BootstrapTextBox
     */
    private $altitute;


    public function loadType(AbstractModelType $type)
    {
        parent::loadType($type);


        //$map = new GoogleMaps($this);

        $formRow = new BootstrapFormRow($this);

        $this->latTextBox = new BootstrapTextBox($formRow);
        $this->latTextBox->label = 'Lat';
        $this->latTextBox->name = $this->type->fieldName . '_lat';
        $this->latTextBox->value = 0;

        $this->lonTextBox = new BootstrapTextBox($formRow);
        $this->lonTextBox->label = 'Lon';
        $this->lonTextBox->name = $this->type->fieldName . '_lon';
        $this->lonTextBox->value = 0;

        $this->altitute = new BootstrapTextBox($formRow);
        $this->altitute->label = 'Altitute';
        $this->altitute->name = $this->type->fieldName . '_alt';
        $this->altitute->value = 0;


        if ($this->row !== null) {

            $property = new GeoCoordinateAltitudeReaderProperty($this->row, $this->type);
            $geoCoordinate = $property->getValue();

            $this->latTextBox->value = $geoCoordinate->latitude;
            $this->lonTextBox->value = $geoCoordinate->longitude;
            $this->altitute->value = $geoCoordinate->altitude;

            //$map->geoCoordinate = $geoCoordinate;

        }


    }


    public function saveValue()
    {

        $geoCoordinate = new GeoCoordinateAltitude();
        $geoCoordinate->latitude = $this->latTextBox->getValue();
        $geoCoordinate->longitude = $this->lonTextBox->getValue();
        $geoCoordinate->altitude = $this->altitute->getValue();

        $property = new GeoCoordinateAltitudeDataProperty($this->type, $this->typeValueList);
        $property->setValue($geoCoordinate);

    }


    public function checkValue()
    {
        $value = true;
        return $value;
    }


}