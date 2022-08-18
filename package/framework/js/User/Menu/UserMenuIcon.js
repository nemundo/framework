import MenuIcon from "../../../framework/Menu/MenuIcon.js";
import LoginWidget from "../Widget/LoginWidget.js";
import GlobalWidgetContainer from "../../Widget/GlobalWidgetContainer.js";
import PositionStyle from "../../../html/Style/Position.js";
import BodyContainer from "../../../html/Document/Body.js";
import UserWidget from "../Widget/UserWidget.js";

export default class UserMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {

        super(parentContainer);

        this.title = "User";
        this.icon = "user";

        let local = this;

        this.onClick = function () {

            GlobalWidgetContainer.clearWidget();

            let widget = new UserWidget();
            GlobalWidgetContainer.addWidget(widget);


        }

    }

}