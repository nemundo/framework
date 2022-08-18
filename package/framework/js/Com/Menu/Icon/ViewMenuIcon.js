import MenuIcon from "../../../Menu/MenuIcon.js";

export default class ViewMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {
        super(parentContainer);
        this.icon = "info";
        this.label="View";
    }

}