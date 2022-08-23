import DivContainer from "../../../html/Content/Div.js";
import OverflowStyle from "../../../html/Style/Overflow.js";

export default class ScrollDiv extends DivContainer {

    constructor(parentContainer) {

        super(parentContainer);

        this.heightPercent = 100;
        this.overflowY = OverflowStyle.AUTO;

    }

}