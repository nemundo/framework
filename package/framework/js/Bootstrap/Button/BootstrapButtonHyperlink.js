import HyperlinkContainer from "../../../html/Hyperlink/Hyperlink.js";

export default class BootstrapButtonHyperlink extends HyperlinkContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.addCssClass("btn btn-primary");


    }



//<a className="btn btn-primary" href="#" role="button">Link</a>

}