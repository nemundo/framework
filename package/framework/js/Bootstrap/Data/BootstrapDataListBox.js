import DataListBox from "../../Data/DataListBox.js";

export default class BootstrapDataListBox extends DataListBox {

    constructor(parentContainer) {

        super(parentContainer);
        this._select.addCssClass("form-select");

        this.columnLayout=true;

    }


    set columnLayout(value) {

        let className = "col";

        if (value) {
            this.addCssClass(className);
        } else {
            this.removeCssClass(className);
        }

    }

}