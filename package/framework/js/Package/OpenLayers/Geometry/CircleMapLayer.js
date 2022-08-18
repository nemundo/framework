import MapLayer from "../Layer/MapLayer.js";
import GeoCoordinateItem from "../../../../core/Geo/GeoCoordinateItem.js";
import MapLayerStyle from "../Style/MapLayerStyle.js";

export default class CircleMapLayer extends MapLayer {

    geoCoordinate;

    radius = 5;

    color = "blue";

    width = 1;

    fill = false;


    constructor() {

        super();
        this.geoCoordinate = new GeoCoordinateItem();

    }


    getLayer() {

        let coordinate = ol.proj.fromLonLat([this.geoCoordinate.longitude, this.geoCoordinate.latitude]);

        let circle = new ol.geom.Circle(coordinate, this.radius);

        let feature = new ol.Feature(circle);
        feature.setId(this.id);

        let style = new MapLayerStyle();
        style.color = this.color;
        style.width = this.width;
        style.fill = this.fill;

        let layer = new ol.layer.Vector({
            source: new ol.source.Vector({
                projection: this.projection,
                features: [feature]
            }),
            style: style.getStyle()
        });

        this._layer = layer;

        return layer;

    }

}