import MenuIcon from "../../../framework/Menu/MenuIcon.js";
import LoginWidget from "../Widget/LoginWidget.js";
import GlobalWidgetContainer from "../../Widget/GlobalWidgetContainer.js";
import PositionStyle from "../../../html/Style/Position.js";
import BodyContainer from "../../../html/Document/Body.js";

export default class LoginMenuIcon extends MenuIcon {


    //onWidgetClose=null;


    constructor(parentContainer = null) {

        super(parentContainer);

        this.title = "Login";
        this.icon = "user";

        let local = this;

        this.onClick = function () {

            GlobalWidgetContainer.clearWidget();

            let widget = new LoginWidget(new BodyContainer());
            widget.position = PositionStyle.FIXED;
            widget.widthPixel = 300;
            widget.leftPercent = 50;
            widget.topPercent = 50;
            widget.transform = "translate(-50%, -50%)";
            widget.onSuccess = function () {
                GlobalWidgetContainer.clearWidget();
                 /*container.clearWidget();
                menu.refreshUser();*/

                local._callMenuClose();

                /*if (local.onWidgetClose!==null) {
                    local.onClose();
                }*/


            }

            GlobalWidgetContainer.addWidget(widget);


        }

    }

}