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

        $this->verticesX[] = $geoCoordinate->longitude;
        $this->verticesY[] = $geoCoordinate->latitude;

        return $this;

    }


    public function inPolygon(AbstractGeoCoordinate $geoCoordinate)
    {

        $latitudeY = $geoCoordinate->latitude;
        $longitudeX = $geoCoordinate->longitude;

        $pointsPolygon = count($this->verticesX);

        $c = false;

        for ($i = 0, $j = $pointsPolygon - 1; $i < $pointsPolygon; $j = $i++) {
            if ((($this->verticesY[$i] > $latitudeY) !== ($this->verticesY[$j] > $latitudeY)) &&
                ($longitudeX < ($this->verticesX[$j] - $this->verticesX[$i]) * ($latitudeY - $this->verticesY[$i]) /
                    (($this->verticesY[$j] - $this->verticesY[$i]) ?: 1e-10) + $this->verticesX[$i])) {
                $c = !$c;
            }
        }

        return $c;

    }


}