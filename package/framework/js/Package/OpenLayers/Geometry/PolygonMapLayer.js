import MapLayer from "../Layer/MapLayer.js";
import MapLayerStyle from "../Style/MapLayerStyle.js";

export default class PolygonMapLayer extends MapLayer {


    color = "red";

    width = 1;

    _coordinateList = [];


    addGeoCoordinate(geoCoordinate) {

        this._coordinateList.push([geoCoordinate.longitude, geoCoordinate.latitude]);
        return this;

    }


    getLayer() {

        var geometry = new ol.geom.Polygon([this._coordinateList]);
        geometry.transform('EPSG:4326', 'EPSG:3857');

        var feature = new ol.Feature({
            geometry: geometry
        });

        /*var lineStyle = new ol.style.Style({
            stroke: new ol.style.Stroke({
                color: this.color,
                width: this.width
            }),
            fill: new ol.style.Fill({
                color: this.color,
                width: 20
            })
        });*/

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