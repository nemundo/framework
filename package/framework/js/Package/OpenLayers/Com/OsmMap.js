import OpenLayersMap from "./OpenLayersMap.js";
import OsmMapLayer from "../Layer/OsmMapLayer.js";

export default class OsmMap extends OpenLayersMap {

    render() {

        super.render();
        this.addMapLayer(new OsmMapLayer());

    }

}