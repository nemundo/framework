<?php

namespace Nemundo\Model\Item\Geo;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;

use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Type\Geo\GeoCoordinateType;

class GeoCoordinateModelItem extends AbstractModelItem
{

    /**
     * @var GeoCoordinateType
     */
    public $type;

    public function getContent()
    {

        $lat = $this->row->getModelValue($this->type->latitude);
        $lon = $this->row->getModelValue($this->type->longitude);
        $url = 'http://www.google.com/maps/place/' . $lat . ',' . $lon;

        $hyperlink = new UrlHyperlink($this);
        $hyperlink->content = 'Maps';
        $hyperlink->url = $url;
        $hyperlink->openNewWindow = true;

        return parent::getContent();
    }


}