import SearchTextBox from "../../Com/Search/SearchTextBox.js";

export default class BootstrapSearchTextBox extends SearchTextBox {

    constructor(parentContainer) {

        super(parentContainer);
        this._input.addCssClass("form-control");

        this.addCssClass("col");

    }

}