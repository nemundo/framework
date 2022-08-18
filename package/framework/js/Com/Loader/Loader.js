import DivContainer from "../../../html/Content/Div.js";

export default class LoaderContainer extends DivContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.addCssClass("loader");

    }

}