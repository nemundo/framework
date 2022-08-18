import BaseContainer from "../../../html/Base/Base.js";


export default class BootstrapIcon extends BaseContainer {

    constructor(parentContainer = null) {

        super("i", parentContainer);

    }


    set icon(value) {

        this.cleanCssClass();
        this.addCssClass("bi bi-" + value);

    }

}