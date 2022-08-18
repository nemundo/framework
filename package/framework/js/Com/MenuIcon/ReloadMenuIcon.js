import MenuIcon from "../../Menu/MenuIcon.js";

export default class ReloadMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {

        super(parentContainer);

        this.label = "Reload";
        this.icon = "arrow-clockwise";

        this.showLabel = false;

    }

}