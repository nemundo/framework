import MenuIcon from "../../../Menu/MenuIcon.js";

export default class EditMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {
        super(parentContainer);
        this.icon = "pencil-square";
        this.label = "Edit";
        this.showLabel = false;
    }

}