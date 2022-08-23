import MenuIcon from "../../../Menu/MenuIcon.js";

export default class DeleteMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {

        super(parentContainer);
        this.icon = "trash";
        this.label = "Delete";
        this.showLabel = false;

    }

}