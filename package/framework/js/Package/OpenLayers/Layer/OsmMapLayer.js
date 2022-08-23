import MapLayer from "./MapLayer.js";

export default class OsmMapLayer extends MapLayer {

    getLayer() {

        let osm = new ol.layer.Tile({
            controls: ol.control.defaults({ attribution: false }),
            source: new ol.source.OSM()
        });

        return osm;

    }

}