import OpenLayersMap from "./OpenLayersMap.js";
import OsmMapLayer from "../Layer/OsmMapLayer.js";


export default class MapTilerMap extends OpenLayersMap {


    jsonStyleUrl = null;


    render() {

        super.render();
        //this.addMapLayer(new OsmMapLayer());

        //var styleJson = 'https://api.maptiler.com/maps/4d7a1f5e-8228-4a54-a1db-e5e0123b2d01/style.json?key=zmWuPOK7GXanB0x5uSfc';
        //let styleJson = "https://api.maptiler.com/maps/pastel/style.json?key=zmWuPOK7GXanB0x5uSfc";

        /*var map = new ol.Map({
            target: 'map',
            view: new ol.View({
                constrainResolution: true,
                center: ol.proj.fromLonLat([8.30091, 47.04737]),
                zoom: 15
            })
        });*/
        olms.apply(this._map, this.jsonStyleUrl);

        this._map.render();

    }

}