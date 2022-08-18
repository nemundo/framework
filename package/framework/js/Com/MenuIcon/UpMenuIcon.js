import MenuIcon from "../../Menu/MenuIcon.js";

export default class ReloadMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {

        super(parentContainer);

        this.label = "Up";
        this.icon = "arrow-up";

        this.showLabel = false;

    }

}