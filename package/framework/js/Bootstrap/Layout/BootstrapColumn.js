import DivContainer from "../../../html/Content/Div.js";
import OverflowStyle from "../../../html/Style/Overflow.js";

export default class BootstrapColumn extends DivContainer {

    constructor(parentContainer) {
        super(parentContainer);
        this.addCssClass("col-sm");
    }


    set scrollVertical(value) {

        //overflow-y: scroll;
        this.overflowY=OverflowStyle.AUTO;

    }






}