import FlexLayout from "./FlexLayout.js";
import FlexDirection from "../../../html/Style/Flex/FlexDirection.js";


export default class ColumnFlexLayout extends FlexLayout {


    constructor(parentContainer) {

        super(parentContainer);
        this.flexDirection = FlexDirection.COLUMN;

    }

}