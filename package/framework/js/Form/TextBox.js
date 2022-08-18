import TextInputContainer from "../../html/Form/TextInput.js";
import LabelContainer from "../../html/Form/Label.js";
import AdminInput from "./AdminInput.js";


export default class TextBox extends AdminInput {


    constructor(parentContainer) {

        super(parentContainer);

        this._label = new LabelContainer(this);
        this._input = new TextInputContainer(this);

    }


    set readOnly(value) {
        this._input.readOnly = value;
    }


    set type(value) {
        this._input.type = value;
    }


    set onEnter(value) {

        this._input.onKeyUp = function (event) {

            if (event.keyCode === 13) {
                value();
            }
        }

    }


}