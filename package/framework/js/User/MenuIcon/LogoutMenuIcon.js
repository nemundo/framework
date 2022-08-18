import MenuIcon from "../../../framework/Menu/MenuIcon.js";
import UserLogoutService from "../Service/UserLogoutService.js";

export default class LogoutMenuIcon extends MenuIcon {

    onLogout = null;

    constructor(parentContainer = null) {

        super(parentContainer);

        this.label = "Logout";
        this.icon = "arrow-bar-left";

        let local = this;

        this.onClick = function () {

            let logout = new UserLogoutService();
            logout.onFinished = function () {
                if (local.onLogout !== null) {
                    local.onLogout();
                }
            };
            logout.sendRequest();

            /*if (local.onLogout !== null) {
                local.onLogout();
            }*/

        }

    }

}