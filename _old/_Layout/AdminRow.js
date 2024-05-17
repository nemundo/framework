import DivContainer from "../../html/Content/Div.js";
import DisplayStyle from "../../html/Style/Display.js";


// LayoutRow
export default class AdminRow extends DivContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.display = DisplayStyle.FLEX;

    }

}