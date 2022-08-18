import DivContainer from "../../../html/Content/Div.js";
import DisplayStyle from "../../../html/Style/Display.js";


export default class FlexLayout extends DivContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.display = DisplayStyle.FLEX;

    }

}