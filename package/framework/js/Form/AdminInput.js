import DivContainer from "../../html/Content/Div.js";


export default class AdminInput extends DivContainer {

    //validation = false;

    _input;

    _label;

    _labelText;


    set name(value) {

        this._input.id = value;
        this._input.name = value;
        this._label.addAttribute("htmlFor", value);

    }


    set label(value) {

        this._labelText = value;

        /*if (this.validation) {
            value = value + "*";
        }*/

        this._label.text = value;

    }


    set validation(value) {

        if (value) {
            this._label.text = this._labelText + "*";
        }

    }





    set errorMessage(value) {
        this._label.text = this._labelText + " <b class=\"error\">" + value + "</b>";
    }

    set value(value) {
        this._input.value = value;
    }

    get value() {
        return this._input.value;
    }


    clearValue() {
        this.value="";
    }


    setFocus() {
        this._input.setFocus();
    }

    set placeholder(value) {
        this._input.placeholder = value;
    }

    set disabled(value) {
        this._input.disabled = value;
    }

    set onKey(event) {
        this._input.onKey = event;
    }

    set onKeyDown(value) {
        this._input.keyDown = value;
    }

    set onFocus(value) {
        this._input.onFocus = value;
    }

    set onFocusOut(value) {
        this._input.onFocusOut = value;
    }

}