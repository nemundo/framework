import MenuIcon from "../../Menu/MenuIcon.js";

export default class ReloadMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {

        super(parentContainer);

        this.label = "Down";
        this.icon = "arrow-down";

        this.showLabel = false;

    }

}