import ListBox from "../../Form/ListBox.js";

export default class BootstrapListBox extends ListBox {

    constructor(parentContainer) {

        super(parentContainer);
        this._select.addCssClass("form-select");

        this.addCssClass("col");

    }

}

