import TextBox from "../../Form/TextBox.js";

export default class AdminTextBox extends TextBox {

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("admin-textbox");
        this._input.addCssClass("admin-input");

    }

}