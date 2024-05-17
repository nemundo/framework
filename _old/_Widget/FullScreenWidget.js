import AdminWidget from "./AdminWidget.js";
import PositionStyle from "../../html/Style/Position.js";
import BodyContainer from "../../html/Document/Body.js";

export default class FullScreenWidget extends AdminWidget {

    constructor() {

        super(new BodyContainer());

        this.position = PositionStyle.FIXED;
        this.heightPercent = 100;
        this.widthPercent = 100;
        this.leftPixel = 0;
        this.topPixel = 0;

        this.showBorder = false;

    }

}