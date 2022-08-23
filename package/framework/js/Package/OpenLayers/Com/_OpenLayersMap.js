import DivContainer from "../../../html/Content/Div.js";
import Debug from "../../../core/Debug/Debug.js";
import ParagraphContainer from "../../../html/Content/Paragraph.js";
import GeoCoordinateItem from "../../../core/Geo/GeoCoordinateItem.js";
import ServiceRequest from "../../Service/ServiceRequest.js";
import WetzikonCoordinate from "../../../wetzitrail/Coordinate/WetzikonCoordinate.js";
import CircleMapLayer from "./Geometry/CircleMapLayer.js";

export default class _OpenLayersMap extends DivContainer {

    _map = null;

    _view = null;

    projection = "EPSG:4326";

    onMapClick = null;

    onFeatureClick = null;

    onCurrentPosition = null;

    currentPosition = new GeoCoordinateItem();


    constructor(parentContainer) {

        super(parentContainer);


        this.addCssClass("map2");

        let local = this;

        this._view = new ol.View({
            projection: "EPSG:3857",
            center: ol.proj.fromLonLat([0, 0]),
            zoom: 20
        });

        this._map = new ol.Map({
            view: this._view,
        });


        this._map.on("click", function (event) {

            if (local.onMapClick !== null) {

                let coordinate =ol.proj.transform(event.coordinate, 'EPSG:3857', 'EPSG:4326');

                let geo = new GeoCoordinateItem();
                geo.latitude=coordinate[1];
                geo.longitude=coordinate[0];

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


    render() {


        this._map.setTarget(this._htmlElement);

        /*this._map.render();*/

        //target: this._htmlElement,
        //this._map.render();


        if (this.onCurrentPosition !==null) {

            let local = this;
            let circle = null;

                let geolocation = new ol.Geolocation({
                    // enableHighAccuracy must be set to true to have the heading value.
                    trackingOptions: {
                        enableHighAccuracy: true,
                    },
                    projection: this.projection  // this._view.getProjection()
                });
                geolocation.setTracking(true);

                geolocation.on('change', function () {
                    /*el('accuracy').innerText = geolocation.getAccuracy() + ' [m]';
                    el('altitude').innerText = geolocation.getAltitude() + ' [m]';
                    el('altitudeAccuracy').innerText = geolocation.getAltitudeAccuracy() + ' [m]';
                    el('heading').innerText = geolocation.getHeading() + ' [rad]';
                    el('speed').innerText = geolocation.getSpeed() + ' [m/s]';*/
                    //p.text = geolocation.getAltitude() + "[m]";

                    /*   (new Debug()).write("geolocation change"+geolocation.getAltitude() + "[m]");

                       (new Debug()).write(geolocation.getPosition());*/


                });


                geolocation.on('error', function (error) {

                    (new Debug()).write(error);

                });


                /*const accuracyFeature = new ol.Feature();
                geolocation.on('change:accuracyGeometry', function () {
                    accuracyFeature.setGeometry(geolocation.getAccuracyGeometry());
                });*/


                /*let positionFeature = new ol.Feature();
                positionFeature.setStyle(
                    new ol.style.Style({
                        image: new ol.style.Circle({
                            radius: 60,
                            fill: new ol.style.Fill({
                                color: '#3399CC',
                            }),
                            stroke: new ol.style.Stroke({
                                color: '#fff',
                                width: 20,
                            }),
                        }),
                    })
                );*/


                //let centerLongitudeLatitude = ol.proj.fromLonLat([coordinate.longitude, coordinate.latitude]);

                //let circleFeature = new ol.Feature(new ol.geom.Circle(centerLongitudeLatitude, 500));


                //let lonLat = ol.proj.fromLonLat([0, 0]);

                /*let circle = new ol.geom.Circle(lonLat);
                let circleFeature = new ol.Feature(circle);


                let layer = new ol.layer.Vector({
                    source: new ol.source.Vector({
                        projection: this.projection,  // 'EPSG:4326',
                        //features: [new ol.Feature(new ol.geom.Circle(centerLongitudeLatitude, 500))]
                        features: [circleFeature]
                    }),
                    style: [
                        new ol.style.Style({
                            stroke: new ol.style.Stroke({
                                color: 'blue',
                                width: 3
                            }),
                            fill: new ol.style.Fill({
                                color: 'rgba(0, 0, 255, 0.1)'
                            })
                        })
                    ]
                });
                this._map.addLayer(layer);*/


                //map.center(47.32969303088442, 8.793793319944491);
                //positionFeature.setGeometry(new ol.geom.Point([8.793793319944491,47.32969303088442], local.projection));


                /*  let feature = new ol.Feature({
                      geometry: new ol.geom.Point(ol.proj.fromLonLat([lon, lat]))
                  });
                  feature.setId(id);

                  let layer = new ol.layer.Vector({
                      source: new ol.source.Vector({
                          features: [
                              feature
                          ]
                      }),
                      style: iconStyle,
                  });
                  this._map.addLayer(layer);*/


                geolocation.on('change:position', function () {

                    let position = geolocation.getPosition();

                    (new Debug()).write("change position");
                    //(new Debug()).write(position.latitude);

                    let lat = position[1];
                    let lon = position[0];

                    local.currentPosition.latitude = lat;
                    local.currentPosition.longitude = lon;

                    if (local.onCurrentPosition !== null) {

                        let coordinate = new GeoCoordinateItem();
                        coordinate.latitude=lat;
                        coordinate.longitude=lon;
                        local.onCurrentPosition(coordinate);

                    }

                    if (circle !==null) {
                        local.removeMapLayer(circle);
                    }

                    circle = new CircleMapLayer();
                    circle.geoCoordinate = local.currentPosition;
                    circle.radius = 200;
                    circle.color = "red";
                    circle.width=5;
                    //circle.fill=true;
                    local.addMapLayer(circle);

                    //(new Debug()).write(lat + "," + lon);

                    //local.center(lat, lon);
                    //ol.proj.fromLonLat([lon, lat]
                    //positionFeature.setGeometry(coordinates ? new ol.geom.Point(coordinates) : null);

                    /*let lonLat = ol.proj.fromLonLat([lon, lat]);
                    circle.setCenter(lonLat);
                    circle.setRadius(500);*/

                    //positionFeature.setGeometry(new ol.geom.Point([lat,lon], local.projection));
                    //positionFeature.setGeometry(new ol.geom.Point(lonLat, local.projection));

                    //local.addMarker(lat,lon,0);
                    //const coords = [coordinates.longitude, coordinates.latitude];

                });




        }


    }




    renderMap() {

        this._map.render();

    }









    // CurrentPositionLayer
    set showCurrentPosition(value) {

        (new Debug()).write("show current position");

        let local = this;

        let circle = null;

        if (value) {

            (new Debug()).write("show current position2");

            let p = new ParagraphContainer(this);

            let geolocation = new ol.Geolocation({
                // enableHighAccuracy must be set to true to have the heading value.
                trackingOptions: {
                    enableHighAccuracy: true,
                },
                projection: this.projection  // this._view.getProjection()
            });
            geolocation.setTracking(true);

            geolocation.on('change', function () {
                /*el('accuracy').innerText = geolocation.getAccuracy() + ' [m]';
                el('altitude').innerText = geolocation.getAltitude() + ' [m]';
                el('altitudeAccuracy').innerText = geolocation.getAltitudeAccuracy() + ' [m]';
                el('heading').innerText = geolocation.getHeading() + ' [rad]';
                el('speed').innerText = geolocation.getSpeed() + ' [m/s]';*/
                //p.text = geolocation.getAltitude() + "[m]";

                /*   (new Debug()).write("geolocation change"+geolocation.getAltitude() + "[m]");

                   (new Debug()).write(geolocation.getPosition());*/


            });


            geolocation.on('error', function (error) {

                (new Debug()).write(error);

            });


            /*const accuracyFeature = new ol.Feature();
            geolocation.on('change:accuracyGeometry', function () {
                accuracyFeature.setGeometry(geolocation.getAccuracyGeometry());
            });*/


            /*let positionFeature = new ol.Feature();
            positionFeature.setStyle(
                new ol.style.Style({
                    image: new ol.style.Circle({
                        radius: 60,
                        fill: new ol.style.Fill({
                            color: '#3399CC',
                        }),
                        stroke: new ol.style.Stroke({
                            color: '#fff',
                            width: 20,
                        }),
                    }),
                })
            );*/


            //let centerLongitudeLatitude = ol.proj.fromLonLat([coordinate.longitude, coordinate.latitude]);

            //let circleFeature = new ol.Feature(new ol.geom.Circle(centerLongitudeLatitude, 500));


            //let lonLat = ol.proj.fromLonLat([0, 0]);

            /*let circle = new ol.geom.Circle(lonLat);
            let circleFeature = new ol.Feature(circle);


            let layer = new ol.layer.Vector({
                source: new ol.source.Vector({
                    projection: this.projection,  // 'EPSG:4326',
                    //features: [new ol.Feature(new ol.geom.Circle(centerLongitudeLatitude, 500))]
                    features: [circleFeature]
                }),
                style: [
                    new ol.style.Style({
                        stroke: new ol.style.Stroke({
                            color: 'blue',
                            width: 3
                        }),
                        fill: new ol.style.Fill({
                            color: 'rgba(0, 0, 255, 0.1)'
                        })
                    })
                ]
            });
            this._map.addLayer(layer);*/


            //map.center(47.32969303088442, 8.793793319944491);
            //positionFeature.setGeometry(new ol.geom.Point([8.793793319944491,47.32969303088442], local.projection));


            /*  let feature = new ol.Feature({
                  geometry: new ol.geom.Point(ol.proj.fromLonLat([lon, lat]))
              });
              feature.setId(id);

              let layer = new ol.layer.Vector({
                  source: new ol.source.Vector({
                      features: [
                          feature
                      ]
                  }),
                  style: iconStyle,
              });
              this._map.addLayer(layer);*/


            geolocation.on('change:position', function () {

                let position = geolocation.getPosition();

                (new Debug()).write("change position");
                //(new Debug()).write(position.latitude);

                let lat = position[1];
                let lon = position[0];

                local.currentPosition.latitude = lat;
                local.currentPosition.longitude = lon;

                if (local.onCurrentPosition !== null) {

                    let coordinate = new GeoCoordinateItem();
                    coordinate.latitude=lat;
                    coordinate.longitude=lon;
                    local.onCurrentPosition(coordinate);

                }

                if (circle !==null) {
                    local.removeMapLayer(circle);
                }

                circle = new CircleMapLayer();
                circle.geoCoordinate = local.currentPosition;
                circle.radius = 200;
                circle.color = "red";
                circle.width=5;
                //circle.fill=true;
                local.addMapLayer(circle);

                //(new Debug()).write(lat + "," + lon);

                //local.center(lat, lon);
                //ol.proj.fromLonLat([lon, lat]
                //positionFeature.setGeometry(coordinates ? new ol.geom.Point(coordinates) : null);

                /*let lonLat = ol.proj.fromLonLat([lon, lat]);
                circle.setCenter(lonLat);
                circle.setRadius(500);*/

                //positionFeature.setGeometry(new ol.geom.Point([lat,lon], local.projection));
                //positionFeature.setGeometry(new ol.geom.Point(lonLat, local.projection));

                //local.addMarker(lat,lon,0);
                //const coords = [coordinates.longitude, coordinates.latitude];

            });

            //new ol.layer.Vector({
            /*let layer = new ol.layer.Vector({
                //map: this._map,
                source: new ol.layer.Vector({
                    features: [positionFeature],
                }),
            });*/


            //this._map.addLayer(layer);


            /*
                        const iconStyle = new ol.style.Style({
                            image: new ol.style.Icon({
                                src: "/img/wetzitrail/poi/photo.png"
                            }),
                        });

                        let feature = new ol.Feature({
                            geometry: new ol.geom.Point(ol.proj.fromLonLat([lon, lat]))
                        });
                        feature.setId(id);

                        let layer = new ol.layer.Vector({
                            source: new ol.source.Vector({
                                features: [
                                    feature
                                ]
                            }),
                            style: iconStyle,
                        });
                        this._map.addLayer(layer);*/


        }

    }


    set rotation(value) {

        this._map.getView().setRotation(value);

    }


    set zoom(value) {

        this._map.getView().setZoom(value);

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


    // setCenter
    /*center(lat, lon) {

        //let lonLat = ol.proj.fromLonLat([lon, lat], this.projection);
        let lonLat = ol.proj.fromLonLat([lon, lat]);
        this._map.getView().setCenter(lonLat);

        return this;

    }*/


    setGeoCoordinateCenter(geoCoordinate) {

        let lonLat = ol.proj.fromLonLat([geoCoordinate.longitude, geoCoordinate.latitude]);
        this._map.getView().setCenter(lonLat);

        return this;

    }


    setCenterCurrentPosition() {

        this.setGeoCoordinateCenter(this.currentPosition);
        return this;

    }


    /*
    clearLayer() {

        this._map.clearLay

    }*/


    /*removeLayer(layer) {


    }*/


    clearMapLayer() {

        //this._map.cle

        let local = this;

        this._map.getLayers().forEach(function (layer) {
            local._map.removeLayer(layer);
        });


    }


    //map.removeLayer(stationsLayer);


    addMapLayer(layer) {


        this._map.addLayer(layer.getLayer());
        return this;

        /*this._map.addLayer(layer);
        return this;*/

    }


    removeMapLayer(layer) {

        this._map.removeLayer(layer.getLayer());
        return this;

    }


    removeLayer(layer) {

        if (layer!==null) {
        this._map.removeLayer(layer);
        }

        return this;

    }



    /*addKmlLayer(kmlUrl) {

        var vector = new ol.layer.Vector({
            source: new ol.source.Vector({
                url: kmlUrl,
                format: new ol.format.KML({})
            })
        });
        this._map.addLayer(vector);

        return vector;

        //return this;

    }*/


    /*addLine() {


        /*  46.90439349957916, 8.416118038861674
          46.92737586334946, 8.490275754990623*/

        //ol.proj.fromLonLat([lon, lat]


        /*let coordinateList = [
            ol.proj.fromLonLat([8.416118038861674, 46.90439349957916]), ol.proj.fromLonLat([8.490275754990623, 46.92737586334946])
        ];*/

    /*    let coordinateList = [
            ol.proj.fromLonLat([1, 1]), ol.proj.fromLonLat([8.490275754990623, 46.92737586334946])
        ];



        let feature = new ol.Feature({
            geometry: new ol.geom.LineString(coordinateList)
        });

        feature.setId(999);


        let fill = new ol.style.Fill({
            color: "blue",
            width: 15,
        });

        fill.setColor("red");


        var layer = new ol.layer.Vector({
            source: new ol.source.Vector({
                features: [
                    feature
                ]
            }),

            style: new ol.style.Style({

                fill: new ol.style.Fill({color: "red", width: 20})

                /*stroke: new ol.style.Stroke({
                    color: "red",
                    width: 1,
                })*/
      /*      })

            /*
             style: new ol.style.Style({
                 stroke: new ol.style.Stroke({color: "red"})
             })*/


    /*    });

        this._map.addLayer(layer);


        //this.center(46.90439349957916, 8.416118038861674);


        (new Debug()).write("line");


        //geometry: new ol.geom.LineString(coordinates),


    }*/


    /*
    addCircle(coordinate, radius = 100) {


        let centerLongitudeLatitude = ol.proj.fromLonLat([coordinate.longitude, coordinate.latitude]);
        let layer = new ol.layer.Vector({
            source: new ol.source.Vector({
                projection: this.projection,  // 'EPSG:4326',
                features: [new ol.Feature(new ol.geom.Circle(centerLongitudeLatitude, radius))]
            }),
            style: [
                new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: 'blue',
                        width: 3
                    }),
                    fill: new ol.style.Fill({
                        color: 'rgba(0, 0, 255, 0.1)'
                    })
                })
            ]
        });
        this._map.addLayer(layer);


        return this;


    }*/


    /*
    addMarkerEvent(lat, lon, event) {


        const iconStyle = new ol.style.Style({
            image: new ol.style.Icon({
                src: "/img/wetzitrail/poi/photo.png"
            }),
        });


        var layer = new ol.layer.Vector({
            source: new ol.source.Vector({
                features: [
                    new ol.Feature({
                        geometry: new ol.geom.Point(ol.proj.fromLonLat([lon, lat])),
                        id: 999,
                        properties: {"id": 1, "resnumb": 'A'}

                    })
                ]
            }),
            style: iconStyle,
        });
        this._map.addLayer(layer);


    }*/




    /*addMarker(lat, lon, id) {

        const iconStyle = new ol.style.Style({
            image: new ol.style.Icon({
                src: "/img/wetzitrail/poi/photo.png"
            }),
        });

        let feature = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([lon, lat]))
        });
        feature.setId(id);

        let layer = new ol.layer.Vector({
            source: new ol.source.Vector({
                features: [
                    feature
                ]
            }),
            style: iconStyle,
        });
        this._map.addLayer(layer);

    }*/


}