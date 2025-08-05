<?php

namespace Nemundo\Geo\Polygon;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;

class GeoCoordinatePolygon extends AbstractBase
{

    private $verticesX = [];

    private $verticesY = [];


    public function addPoint(AbstractGeoCoordinate $geoCoordinate)
    {

        $this->verticesX[] = $geoCoordinate->latitude;
        $this->verticesY[] = $geoCoordinate->longitude;

        return $this;

    }


    public function inPolygon(AbstractGeoCoordinate $geoCoordinate)
    {

        $latitudeX = $geoCoordinate->latitude;
        $longitudeY = $geoCoordinate->longitude;

        $pointsPolygon = count($this->verticesX);

        $found = false;

        for ($i = 0, $j = $pointsPolygon - 1; $i < $pointsPolygon; $j = $i++) {

            if (!$found) {
                if ((($this->verticesY[$i] > $latitudeX != ($this->verticesY[$j] > $latitudeX)) &&
                    ($longitudeY < ($this->verticesX[$j] - $this->verticesX[$i]) * ($latitudeX - $this->verticesY[$i]) / ($this->verticesY[$j] - $this->verticesY[$i]) + $this->verticesX[$i]))) {
                    $found = !$found;
                }
            }
        }

        return $found;

    }

}