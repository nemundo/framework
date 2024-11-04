import LabelContainer from "../../html/Form/Label.js";
import AdminInput from "./AdminInput.js";
import CheckboxContainer from "../../html/Form/Checkbox.js";


export default class Checkbox extends AdminInput {

    constructor(parentContainer) {

        super(parentContainer);

        this._input = new CheckboxContainer(this);
        this._label = new LabelContainer(this);

    }

    set inputId(value) {

        this._input.id = value;
        this._label.htmlFor = value;

    }

    set checked(value) {
        this._input.checked = value;
    }


    get checked() {
        return this._input.checked;
    }


}