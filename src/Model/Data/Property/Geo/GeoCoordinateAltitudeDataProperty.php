<?php

namespace Nemundo\Model\Data\Property\Geo;


use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Nemundo\Model\Data\Property\AbstractDataProperty;
use Nemundo\Model\Type\Geo\GeoCoordinateAltitudeType;


class GeoCoordinateAltitudeDataProperty extends AbstractDataProperty
{

    /**
     * @var GeoCoordinateAltitudeType
     */
    protected $type;


    public function setValue(GeoCoordinateAltitude $geoCoordinate = null)
    {

        if ($geoCoordinate !== null) {
            $this->typeValueList->setModelValue($this->type->latitude, $geoCoordinate->latitude);
            $this->typeValueList->setModelValue($this->type->longitude, $geoCoordinate->longitude);
            $this->typeValueList->setModelValue($this->type->altitude, $geoCoordinate->altitude);
        }

        return $this;

    }

}