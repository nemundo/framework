import DivContainer from "../../../html/Content/Div.js";

export default class BootstrapSpinner extends DivContainer {


    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("spinner-border text-secondary");



    }



    /*
<div className="spinner-border" role="status">
<span className="sr-only">Loading...</span>
</div>*/


}