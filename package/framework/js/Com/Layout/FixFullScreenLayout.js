import BodyContainer from "../../../html/Document/Body.js";
import DivContainer from "../../../html/Content/Div.js";
import PositionStyle from "../../../html/Style/Position.js";

export default class FixFullScreenLayout extends DivContainer {

    constructor(parentContainer) {

        super(parentContainer);

        this.position=PositionStyle.FIXED;
        this.topPixel=0;
        this.leftPixel=0;
        this.widthPercent=100;
        this.heightPercent=100;



        // body
        /*this.marginPixel=0;
        this.paddingPixel=0;*/



        

    }


}