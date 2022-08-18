import DivContainer from "../../../html/Content/Div.js";

export default class BootstrapFluidContainer extends DivContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.addCssClass("container-fluid");

    }

}