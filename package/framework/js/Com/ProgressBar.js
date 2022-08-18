import DivContainer from "../../html/Content/Div.js";


export default class ProgressBar extends DivContainer {


    _div;

    constructor(parentContainer) {

        super(parentContainer);
        this.addCssClass("progress");

        this._div = new DivContainer(this);
        this._div.addCssClass("progress-bar");

        this.value = 0;

    }


    set value(value) {

        this._div.addAttribute("style", "width:" + value + "%");
        this._div.text = value+" %";

    }

}
