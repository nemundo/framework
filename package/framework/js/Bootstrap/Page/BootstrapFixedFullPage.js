import PageContainer from "../../Page/PageContainer.js";
import BootstrapContainer from "../Layout/BootstrapContainer.js";
import PositionStyle from "../../../html/Style/Position.js";
import OverflowStyle from "../../../html/Style/Overflow.js";
import DisplayStyle from "../../../html/Style/Display.js";
import FlexDirection from "../../../html/Style/Flex/FlexDirection.js";

export default class BootstrapFixedFullPage extends PageContainer {

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("container-fluid");

        this.position=PositionStyle.FIXED;
        this.top=0;
        this.left=0;
        this.widthPercent=100;
        //this.heightPercent=100;

        this.topPixel=70;

        this.addCssClass("h-100");

        this.display=DisplayStyle.FLEX;
        this.flexDirection=FlexDirection.COLUMN;

        this.overflow=OverflowStyle.AUTO;

    }
    
}