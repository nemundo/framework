import DivContainer from "../../../html/Content/Div.js";
import PositionStyle from "../../../html/Style/Position.js";


export default class CenterLayout extends DivContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.centerLayout = true;

    }


    set centerLayout(value) {

        if (value) {

            this.position = PositionStyle.FIXED;
            this.leftPercent = 50;
            this.topPercent = 50;
            this.transform = "translate(-50%, -50%)";

        } else {

            this.position = "";
            this.leftPercent = "";
            this.topPercent = "";
            this.transform = "";

        }

    }

}