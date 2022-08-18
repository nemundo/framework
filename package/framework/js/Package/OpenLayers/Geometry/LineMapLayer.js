import MapLayer from "../Layer/MapLayer.js";
import Debug from "../../../../core/Debug/Debug.js";
import MapLayerStyle from "../Style/MapLayerStyle.js";

export default class LineMapLayer extends MapLayer {


    color = "red";

    width = 1;

    _coordinateList = [];


    addGeoCoordinate(geoCoordinate) {

        this._coordinateList.push([geoCoordinate.longitude, geoCoordinate.latitude]);
        return this;

    }


    getLayer() {

        var lineString = new ol.geom.LineString(this._coordinateList);
        lineString.transform('EPSG:4326', 'EPSG:3857');

        var feature = new ol.Feature({
            geometry: lineString,
            //name: 'Line'
        });
        feature.setId(this.id);


        let style = new MapLayerStyle();
        style.color=this.color;
        style.width=this.width;


        var source = new ol.source.Vector({
            features: [feature]
        });

        this._layer = new ol.layer.Vector({
            source: source,
            style: [style.getStyle()]
        });

        return this._layer;

    }

}