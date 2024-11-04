import TextBox from "../../Form/TextBox.js";
import Checkbox from "../../Form/Checkbox.js";

export default class AdminCheckBox extends Checkbox {

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("admin-checkbox-container");

        this._label.addCssClass("admin-checkbox-label");
        this._input.addCssClass("admin-checkbox");

    }

}