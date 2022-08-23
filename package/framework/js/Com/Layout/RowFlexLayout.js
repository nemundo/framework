import FlexLayout from "./FlexLayout.js";
import FlexDirection from "../../../html/Style/Flex/FlexDirection.js";

export default class RowFlexLayout extends FlexLayout {

    constructor(parentContainer) {

        super(parentContainer);
        this.flexDirection = FlexDirection.ROW;
        //this.flexWrap = true;

    }

}