<?php

namespace Nemundo\Model\Form\Item\Geo;


use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Reader\Property\Geo\GeoCoordinateReaderProperty;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\Geo\GeoCoordinateType;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class GeoCoordinateModelFormItem extends AbstractModelFormItem
{

    /**
     * @var GeoCoordinateType
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


        if ($this->row !== null) {

            $geoCoordinateReader = new GeoCoordinateReaderProperty($this->row, $type);
            $geoCoordinate = $geoCoordinateReader->getValue();
            $this->latTextBox->value = $geoCoordinate->latitude;
            $this->lonTextBox->value = $geoCoordinate->longitude;

            //$map->geoCoordinate = $geoCoordinate;
        }

    }


    public function saveValue()
    {

        $geoCoordinate = new GeoCoordinate();
        $geoCoordinate->latitude = $this->latTextBox->getValue();
        $geoCoordinate->longitude = $this->lonTextBox->getValue();

        $property = new GeoCoordinateDataProperty($this->type, $this->typeValueList);
        $property->setValue($geoCoordinate);

    }


    public function checkValue()
    {
        $value = true;
        return $value;
    }


}