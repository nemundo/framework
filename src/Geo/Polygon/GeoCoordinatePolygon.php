<?php

namespace Nemundo\Geo\Polygon;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;

class GeoCoordinatePolygon extends AbstractBase
{

    private $x = [];

    private $y = [];

    public function addPoint(AbstractGeoCoordinate $geoCoordinate)
    {

        $this->x[] = $geoCoordinate->longitude;
        $this->y[] = $geoCoordinate->latitude;

        return $this;

    }


    public function inPolygon(AbstractGeoCoordinate $geoCoordinate)
    {

        $longitudeX = $geoCoordinate->longitude;
        $latitudeY = $geoCoordinate->latitude;

        $count = count($this->x);

        $intersection = false;

        for ($i = 0, $j = $count - 1; $i < $count; $j = $i++) {
            if ((($this->y[$i] > $latitudeY) !== ($this->y[$j] > $latitudeY)) &&
                ($longitudeX < ($this->x[$j] - $this->x[$i]) * ($latitudeY - $this->y[$i]) /
                    (($this->y[$j] - $this->y[$i]) ?: 1e-10) + $this->x[$i])) {
                $intersection = !$intersection;
            }
        }

        return $intersection;

    }

}