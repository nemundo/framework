import TextBox from "../../Form/TextBox.js";
import LargeTextBox from "../../Form/LargeTextBox.js";

export default class AdminTextBox extends LargeTextBox {

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("admin-textbox");
        this._input.addCssClass("admin-input");

    }

}