import FontAwesomeIcon from "../../../FontAwesome/FontAwesomeIcon.js";

export default class ClearMenuIcon extends FontAwesomeIcon {  // MenuIcon {

    constructor(parentContainer = null) {
        super(parentContainer);
        this.icon = "x-lg";
        this.label = "Clear";
    }

}