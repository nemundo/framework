import MenuIcon from "../../Menu/MenuIcon.js";
import BrowserFullscreen from "../../../core/System/BrowserFullscreen.js";


export default class BrowserFullscreenMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {

        super(parentContainer);

        this.label = "Fullscreen";
        this.icon = "arrows-fullscreen";
        this.showLabel = false;

        this.onClick = function () {
            (new BrowserFullscreen()).toggleFullscreen();
        }

    }

}