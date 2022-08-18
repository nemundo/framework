import ListBox from "../../ListBox.js";

export default class AdminListBox extends ListBox {

    constructor(parentContainer) {

        super(parentContainer);
        this.addCssClass("admin-textbox");
        this._select.addCssClass("admin-select");

    }

}

