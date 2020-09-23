<?php

namespace Nemundo\Geo\Kml\Object;


use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Nemundo\Geo\Kml\Container\Placemark;
use Nemundo\Geo\Kml\Element\Point;
use Nemundo\Geo\Kml\Property\HtmlDescription;
use Nemundo\Geo\Kml\Property\Name;


class KmlMarker extends Placemark
{

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $description;

    /**
     * @var GeoCoordinateAltitude
     */
    public $coordinate;


    public function getContent()
    {


        if ($this->label !== null) {
            $name = new Name($this);
            $name->value = $this->label;
        }

        if ($this->description !== null) {
            $name = new HtmlDescription($this);
            $name->value = $this->description;
        }

        $point = new Point($this);
        $point->coordinate = $this->coordinate;

        return parent::getContent();

    }


    /*
<Placemark>
<name>Ein Punkt im Nichts</name>
<description>
<![CDATA[
<a href="#pm1;balloon">Klick To Open</a>
]]>
</description>
<Point>
<coordinates>
7.14986,51.71342,0
</coordinates>
</Point>
</Placemark>
*/

}