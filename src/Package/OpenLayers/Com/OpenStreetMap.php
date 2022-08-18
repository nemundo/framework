<?php

namespace Nemundo\Package\OpenLayers\Com;

class OpenStreetMap extends AbstractOpenLayersMap
{

    public function getContent()
    {

        $this->defaultLayer = 'new ol.layer.Tile({
            source: new ol.source.OSM()
          })';

        return parent::getContent();

    }

}