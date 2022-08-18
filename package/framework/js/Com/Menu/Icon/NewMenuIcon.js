import MenuIcon from "../../../Menu/MenuIcon.js";

export default class NewMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {
        super(parentContainer);
        this.icon = "plus-lg";
        this.label="New";
    }

}