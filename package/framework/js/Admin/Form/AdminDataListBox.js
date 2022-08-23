import DataListBox from "../../Data/DataListBox.js";

export default class AdminDataListBox extends DataListBox {

    constructor(parentContainer) {

        super(parentContainer);
        this.addCssClass("admin-textbox");
        this._select.addCssClass("admin-select");

    }

}