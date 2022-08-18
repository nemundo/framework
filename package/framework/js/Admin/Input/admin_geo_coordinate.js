import DocumentContainer from "../../../html/Document/Document.js";
import InputContainer from "../../../html/Form/Input.js";
import OsmMapLayer from "../../Package/OpenLayers/Layer/OsmMapLayer.js";
import OpenLayersMap from "../../Package/OpenLayers/Com/OpenLayersMap.js";
import CircleMapLayer from "../../Package/OpenLayers/Geometry/CircleMapLayer.js";
import DivContainer from "../../../html/Content/Div.js";
import GeoCoordinateItem from "../../../core/Geo/GeoCoordinateItem.js";
import SwisstopoLayerType from "../../../swisstopo/Type/SwisstopoLayerType.js";
import SwisstopoMapLayer from "../../../swisstopo/Com/Map/SwisstopoMapLayer.js";

let document = new DocumentContainer();
document.onLoaded = function () {

    let input = new InputContainer();
    input.fromId("geo_input");

    let layout = new DivContainer();
    layout.fromId("geo_input_map");

    //alert(input.value);

    let coordinate = new GeoCoordinateItem();

    if (input.value !== "") {
        coordinate.fromText(input.value);
    }

    //new OpenLayersMap()

    let map = new OpenLayersMap(layout);
    map.setGeoCoordinateCenter(coordinate);
    map.addCssClass("admin-map");
    map.addMapLayer(new OsmMapLayer());

    let layer = new SwisstopoMapLayer();
    layer.swisstopoLayerName=SwisstopoLayerType.PIXELKARTE;
    map.addMapLayer(layer);



    let circle = new CircleMapLayer();
    circle.geoCoordinate = coordinate;
    circle.radius = 10;
    map.addMapLayer(circle);

    map.onMapClick = function (geoCoordinate) {

        input.value = geoCoordinate.getText();

        map.removeMapLayer(circle);
        //map.removeLayer(circle._layer);

        circle.geoCoordinate = geoCoordinate;
        map.addMapLayer(circle);

    }

    map.zoom = 10;
    map.render();

};