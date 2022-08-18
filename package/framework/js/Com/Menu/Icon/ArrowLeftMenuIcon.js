import MenuIcon from "../../../Menu/MenuIcon.js";

export default class BackMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {
        super(parentContainer);
        this.icon = "arrow-left";
        this.label = "Back";
        this.showLabel = false;
    }

}