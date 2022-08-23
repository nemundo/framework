import DivContainer from "../../../../html/Content/Div.js";
import Debug from "../../../../core/Debug/Debug.js";
import GeoCoordinateItem from "../../../../core/Geo/GeoCoordinateItem.js";
import CircleMapLayer from "../Geometry/CircleMapLayer.js";

export default class OpenLayersMap extends DivContainer {

    _map = null;

    _view = null;

    projection = "EPSG:4326";

    onMapClick = null;

    onFeatureClick = null;

    onCurrentPosition = null;

    currentPosition = new GeoCoordinateItem();


    constructor(parentContainer) {

        super(parentContainer);

        //this.addCssClass("map-full");
        //this.addCssClass("admin-map");

        let local = this;

        this._view = new ol.View({
            projection: "EPSG:3857",
            center: ol.proj.fromLonLat([0, 0]),
            zoom: 10
        });

        this._map = new ol.Map({
            view: this._view,
            interaction: null,
            control: null
        });


        this._map.on("click", function (event) {

            if (local.onMapClick !== null) {

                let coordinate = ol.proj.transform(event.coordinate, 'EPSG:3857', 'EPSG:4326');

                let geo = new GeoCoordinateItem();
                geo.latitude = coordinate[1];
                geo.longitude = coordinate[0];

                local.onMapClick(geo);

            }

            local._map.forEachFeatureAtPixel(event.pixel, function (feature, layer) {

                (new Debug()).write(feature.getId());

                if (local.onFeatureClick !== null) {
                    local.onFeatureClick(feature.getId());
                }

            });

        });

        this._map.on("pointermove", function (event) {

            local._map.getTargetElement().style.cursor = local._map.hasFeatureAtPixel(local._map.getEventPixel(event.originalEvent)) ? 'pointer' : '';

        });

    }



    set showCurrentPosition(value) {


        let local = this;

        let circle = null;
        let circle2 = null;


        let firstUser = true;

        this.onCurrentPosition = function (geoCoordinate) {

            (new Debug()).write("current position event");
            (new Debug()).write(geoCoordinate);

            if (firstUser) {

                local.setCenterCurrentPosition();
                firstUser=false;

            }



            if (circle !== null) {
                local.removeMapLayer(circle);
                local.removeMapLayer(circle2);
            }

            circle = new CircleMapLayer();
            circle.geoCoordinate = geoCoordinate;
            circle.radius = 10;
            circle.color = "blue";
            circle.fill = true;

            circle2 = new CircleMapLayer();
            circle2.geoCoordinate = geoCoordinate;
            circle2.radius = 100;
            circle2.width = 3;
            circle2.color = "blue";

            local.addMapLayer(circle);
            local.addMapLayer(circle2);

        }

    }


    render() {


        (new Debug()).write("openlayers render");


        //admin-map-full

        /*width: 100%;height: 800px;*/

        //this.addCssClass("admin-map-full");
        //this.addAttribute("style", "width: 100%;height: 800px");

        this._map.setTarget(this._htmlElement);

        if (this.onCurrentPosition !== null) {

            let local = this;
            //let circle = null;

            let geolocation = new ol.Geolocation({
                // enableHighAccuracy must be set to true to have the heading value.
                trackingOptions: {
                    enableHighAccuracy: true,
                },
                projection: this.projection  // this._view.getProjection()
            });
            geolocation.setTracking(true);


            geolocation.on('error', function (error) {

                (new Debug()).write(error);

            });

            geolocation.on('change:position', function () {


                (new Debug()).write("change position");


                let position = geolocation.getPosition();

                let lat = position[1];
                let lon = position[0];

                local.currentPosition.latitude = lat;
                local.currentPosition.longitude = lon;

                //if (local.onCurrentPosition !== null) {

                    let coordinate = new GeoCoordinateItem();
                    coordinate.latitude = lat;
                    coordinate.longitude = lon;
                    local.onCurrentPosition(coordinate);

                //}

            });

        }

    }


    set rotation(value) {

        this._map.getView().setRotation(value);

    }


    set zoom(value) {

        this._map.getView().setZoom(value);

    }


    set zoomMin(value) {

        this._map.getView().setMinZoom(value);

    }

    set zoomMax(value) {

        this._map.getView().setMaxZoom(value);

    }




    get zoom() {

        return this._map.getView().getZoom();

    }


    zoomPlus() {

        this.zoom = this.zoom + 1;

    }

    zoomMinus() {

        this.zoom = this.zoom - 1;

    }



    set zoomControl(value) {

        let interaction = this._map.getInteractions();




        /*interactions: ol.interaction.defaults({
            doubleClickZoom :false,
            dragAndDrop: false,
            keyboardPan: false,
            keyboardZoom: false,
            mouseWheelZoom: false,
            pointer: false,
            select: false
        }),*/



    }



    set fullscreenControl(value) {

        //controls: defaultControls().extend([new FullScreen()]),
        //this._map.getcon

        /*this._map.getInteractions().forEach(function (interaction) {
            if(interaction instanceof ol.interaction.Zoom) {
                (new Debug()).write("zoom");
            }
        });*/

    }





    // set geoCoordinateCenter(value)
    setGeoCoordinateCenter(geoCoordinate) {

        let lonLat = ol.proj.fromLonLat([geoCoordinate.longitude, geoCoordinate.latitude]);
        this._map.getView().setCenter(lonLat);

        return this;

    }


    setCenterCurrentPosition() {

        this.setGeoCoordinateCenter(this.currentPosition);
        return this;

    }


    addMapLayer(layer) {

        this._map.addLayer(layer.getLayer());
        return this;

    }


    removeMapLayer(layer) {

        //this._map.removeLayer(layer.getLayer());
        this._map.removeLayer(layer._layer);
        return this;

    }

}