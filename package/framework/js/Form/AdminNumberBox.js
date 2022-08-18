import TextBox from "./TextBox.js";


export default class AdminNumberBox extends TextBox {

    constructor(parentContainer) {

        super(parentContainer);
        this._input.type = "number";

    }

}