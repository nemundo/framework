import MenuIcon from "../../../Menu/MenuIcon.js";

export default class PlusMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {
        super(parentContainer);
        this.icon = "file-plus";
        this.label = "Add";
    }

}