import BaseContainer from "../../html/Base/Base.js";

export default class FontAwesomeIcon extends BaseContainer {

    constructor(parentContainer = null) {

        super("i", parentContainer);

    }


    set icon(value) {

        this.addCssClass("fa-solid fa-" + value);

    }

}