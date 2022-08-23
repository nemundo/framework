import MenuIcon from "../../../Menu/MenuIcon.js";

export default class CloseMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {
        super(parentContainer);
        this.icon = "x-lg";
        this.label = "Cancel";
        this.showLabel = false;
    }

}