import DivContainer from "../../../html/Content/Div.js";

export default class BootstrapRow extends DivContainer {

    constructor(parentContainer) {
        super(parentContainer);
        this.addCssClass("row");
    }

}