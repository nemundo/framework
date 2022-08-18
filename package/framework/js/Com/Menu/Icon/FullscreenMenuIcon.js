import MenuIcon from "../../../Menu/MenuIcon.js";
import PositionStyle from "../../../../html/Style/Position.js";
import Debug from "../../../../core/Debug/Debug.js";

export default class FullscreenMenuIcon extends MenuIcon {

    _minimized = true;

    constructor(parentContainer = null) {

        super(parentContainer);
        this.icon = "arrow-up-right";
        this.label = "Fullscreen";

    }


    set attachTo(value) {

        let local = this;

        this.onClick = function () {

            (new Debug()).write(local._minimized);

            if (local._minimized) {

                local._minimized = false;
                local.icon = "x-lg";
                local.label = "Minimize";

                let positionTmp = value.position;
                let leftTmp = value.left;
                let topTmp = value.top;
                let widthPercentTmp = value.widthPercent;
                let heightPercentTmp = value.heightPercent;
                let zIndexTmp = value.zIndex;

                /*let body = new BodyContainer();

                let background = new DivContainer(body);
                background.position = PositionStyle.FIXED;
                background.left = 0;
                background.top = 0;
                background.widthPercent = 100;
                background.heightPercent = 100;
                background.zIndex = 1899;
                background.color = ColorStyle.LIGHT_GREY;*/

                value.position = PositionStyle.FIXED;
                value.left = 0;
                value.top = 0;
                value.widthPercent = 100;
                value.heightPercent = 100;
                value.zIndex = 5900;

            } else {

                local._minimized = true;
                local.icon = "arrow-up-right";
                local.label = "Fullscreen";


                value.position = ""; //positionTmp;
                //value.left = leftTmp;
                //value.top = topTmp;
                value.widthPercent = "";//widthPercentTmp;
                value.heightPercent = ""; //heightPercentTmp;
                //value.zIndex = zIndexTmp;


            }


            /*let closeIcon=new CloseMenuIcon();
            closeIcon.onClick = function () {

                local._widget.position = ""; //positionTmp;
                local._widget.left = leftTmp;
                local._widget.top = topTmp;
                local._widget.widthPercent = "";//widthPercentTmp;
                local._widget.heightPercent = ""; //heightPercentTmp;
                local._widget.zIndex = zIndexTmp;

                closeIcon.removeContainer();
                //fullscrennIcon.visible=true;

            };*/

            //local._widget._header.addContainer(closeIcon);

            //fullscrennIcon.visible=false;

        };

    }

}