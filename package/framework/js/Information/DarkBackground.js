import DivContainer from "../../html/Content/Div.js";
import PositionStyle from "../../html/Style/Position.js";

export default class DarkBackground extends DivContainer {


    onBackgroundClick = null;


    constructor(parentContainer) {

        super(parentContainer);

        this.position = PositionStyle.FIXED;
        this.left = 0;
        this.top = 0;
        this.widthPercent = 100;
        this.heightPercent = 100;
        this.backgroundColor = "#bebebf";
        this.opacity = 0.9;
        this.zIndex = 100;

    }


    render() {

        let local=this;

        if (this.onBackgroundClick !== null) {

            this.onClick = function () {
                local.onBackgroundClick();
                local.removeContainer();
            }

        }

    }


}