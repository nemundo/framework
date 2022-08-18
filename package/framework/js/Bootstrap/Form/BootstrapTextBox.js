import TextBox from "../../Form/TextBox.js";

export default class BootstrapTextBox extends TextBox {


    constructor(parentContainer) {

        super(parentContainer);
        this._input.addCssClass("form-control");

    }


}