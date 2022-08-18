import LargeTextBox from "../../Form/LargeTextBox.js";

export default class BootstrapLargeTextBox extends LargeTextBox {

    constructor(parentContainer) {

        super(parentContainer);
        this._input.addCssClass("form-control");

    }

}