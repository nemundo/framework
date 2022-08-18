import DatePicker from "../../Form/DatePicker.js";

export default class BootstrapDatePicker extends DatePicker {

    constructor(parentContainer) {

        super(parentContainer);
        this._input.addCssClass("form-control");

    }


}