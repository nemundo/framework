import MapLayer from "../Layer/MapLayer.js";

export default class KmlMapLayer extends MapLayer {


    kmlUrl;


    getLayer() {

        var vector = new ol.layer.Vector({
            source: new ol.source.Vector({
                url: this.kmlUrl,
                format: new ol.format.KML({})
            })
        });
        //this._map.addLayer(vector);

        return vector;


    }


}