import MapLayer from "../Layer/MapLayer.js";
import GeoCoordinateItem from "../../../../core/Geo/GeoCoordinateItem.js";

export default class MarkerMapLayer extends MapLayer {


    iconUrl;

    geoCoordinate;

    constructor() {

        super();
        this.geoCoordinate = new GeoCoordinateItem();

    }


    getLayer() {

        const iconStyle = new ol.style.Style({
            image: new ol.style.Icon({
                src: this.iconUrl
            }),
        });

        let feature = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([this.geoCoordinate.longitude, this.geoCoordinate.latitude]))
        });
        feature.setId(this.id);

        this._layer = new ol.layer.Vector({
            source: new ol.source.Vector({
                features: [
                    feature
                ]
            }),
            style: iconStyle,
        });

        return this._layer;

    }


}