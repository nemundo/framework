import LabelContainer from "../../html/Form/Label.js";
import AdminInput from "./AdminInput.js";
import CheckboxContainer from "../../html/Form/Checkbox.js";


export default class AdminCheckbox extends AdminInput {

    constructor(parentContainer) {

        super(parentContainer);

        this._label = new LabelContainer(this);
        this._input = new CheckboxContainer(this);
        //this._input = new CheckboxContainer(this._label);

    }


    set checked(value) {
        this._input.checked = value;
    }


    get checked() {
        return this._input.checked;
    }


/*    render() {

    }*/


    /*set name2(value) {

        this.name = value;
        this._label.addAttribute("htmlFor", value);

    }*/


}